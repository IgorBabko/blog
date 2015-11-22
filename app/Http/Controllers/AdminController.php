<?php

namespace Blog\Http\Controllers;

use Blog\Http\Controllers\Controller;
use Blog\Http\Requests\PostCreateRequest;
use Blog\Http\Requests\PostUpdateRequest;
use Blog\Http\Requests\TagCreateRequest;
use Blog\Http\Requests\TagUpdateRequest;
use Blog\Http\Requests\UploadFileRequest;
use Blog\Http\Requests\UploadNewFolderRequest;
use Blog\Jobs\PostFormFields;
use Blog\Post;
use Blog\Services\UploadsManager;
use Blog\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    protected $manager;

    protected $fields = [
        'tag' => '',
        'title' => '',
        'subtitle' => '',
        'meta_description' => '',
        'page_image' => '',
        'layout' => 'blog.layouts.index',
        'reverse_direction' => 0,
    ];

    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $folder = $request->get('folder');
        $data = $this->manager->folderInfo($folder);
        return view('admin.index', ['posts' => Post::all(), 'tags' => Tag::all(), 'uploads' => $data]);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost()
    {
        $data = $this->dispatch(new PostFormFields());
        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(PostCreateRequest $request)
    {
        $post = Post::create($request->postFillData());
        $post->syncTags($request->get('tags', []));
        return redirect()->route('admin.post.index')
            ->withSuccess('New Post Successfully Created.');
    }

    /**
     * Display the posts list.
     *
     * @param  int  $pageId
     * @return \Illuminate\Http\Response
     */
    public function showPosts($pageId)
    {

    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPost($id)
    {
        //
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPost($id)
    {
        $data = $this->dispatch(new PostFormFields($id));
        return view('admin.post.edit', $data);
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePost(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->postFillData());
        $post->save();

        $post->syncTags($request->get('tags', []));
        if ($request->action === 'continue') {
            return redirect()
                ->back()
                ->withSuccess('Post saved.');
        }
        return redirect()
            ->route('admin.post.index')
            ->withSuccess('Post saved.');
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPost($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();
        return redirect()
            ->route('admin.post.index')
            ->withSuccess('Post deleted.');
    }

    // tags

    /**
     * Show the form for creating a new tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTag()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        return view('admin.tag.create', $data);
    }

    /**
     * Store a newly created tag in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTag(TagCreateRequest $request)
    {
        $tag = new Tag();
        foreach (array_keys($this->fields) as $field) {
            $tag->$field = $request->get($field);
        }

        $tag->save();
        return redirect('/admin/tag')->withSuccess("The tag '$tag->tag' was created.");
    }

    /**
     * Show the form for editing a tag.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTag($id)
    {
        $tag = Tag::findOrFail($id);
        $data = ['id' => $id];

        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $tag->$field);
        }

        return view('admin.tag.edit', $data);
    }

    /**
     * Update the tag in storage.
     *
     * @param  TagUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTag(TagUpdateRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);

        foreach (array_keys(array_except($this->fields, ['tag'])) as $field) {
            $tag->$field = $request->get($field);
        }

        $tag->save();

        return redirect("/admin/tag/$id/edit")->withSuccess("Changes saved.");
    }

    /**
     * Remove the tag from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTag($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect('/admin/tag')->withSuccess("The '$tag->tag' tag has been deleted.");
    }

    /////////////////

    // uploads

    /**
     * Show page of files / subfolders
     */
    // public function index(Request $request)
    // {
    //     $folder = $request->get('folder');
    //     $data = $this->manager->folderInfo($folder);
    //     return view('admin.upload.index', $data);
    // }

    /**
     * Create a new folder
     */
    public function createFolder(UploadNewFolderRequest $request)
    {
        $new_folder = $request->get('new_folder');
        $folder = $request->get('folder') . '/' . $new_folder;
        $result = $this->manager->createDirectory($folder);
        if ($result === true) {
            return redirect()
                ->back()
                ->withSuccess("Folder '$new_folder' created.");
        }
        $error = $result ?: "An error occurred creating directory.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    /**
     * Delete a file
     */
    public function deleteFile(Request $request)
    {
        $del_file = $request->get('del_file');
        $path = $request->get('folder') . '/' . $del_file;
        $result = $this->manager->deleteFile($path);
        if ($result === true) {
            return redirect()
                ->back()
                ->withSuccess("File '$del_file' deleted.");
        }
        $error = $result ?: "An error occurred deleting file.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    /**
     * Delete a folder
     */
    public function deleteFolder(Request $request)
    {
        $del_folder = $request->get('del_folder');
        $folder = $request->get('folder') . '/' . $del_folder;
        $result = $this->manager->deleteDirectory($folder);
        if ($result === true) {
            return redirect()
                ->back()
                ->withSuccess("Folder '$del_folder' deleted.");
        }
        $error = $result ?: "An error occurred deleting directory.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    /**
     * Upload new file
     */
    public function uploadFile(UploadFileRequest $request)
    {
        $file = $_FILES['file'];
        $fileName = $request->get('file_name');
        $fileName = $fileName ?: $file['name'];
        $path = str_finish($request->get('folder'), '/') . $fileName;
        $content = File::get($file['tmp_name']);
        $result = $this->manager->saveFile($path, $content);
        if ($result === true) {
            return redirect()
                ->back()
                ->withSuccess("File '$fileName' uploaded.");
        }
        $error = $result ?: "An error occurred uploading file.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }
}
