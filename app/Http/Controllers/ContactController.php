<?php

namespace Blog\Http\Controllers;

use Blog\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the form
     *
     * @return View
     */
    public function showForm()
    {
        return view('blog.partials.contact');
    }

    /**
     * Email the contact request
     *
     * @param ContactMeRequest $request
     * @return Redirect
     */
    public function sendContactInfo(ContactMeRequest $request)
    {
        $data = $request->only('name', 'email', 'phone');
        $data['messageLines'] = explode("\n", $request->get('message'));
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->subject('Blog Contact Form: ' . $data['name'])
                ->to(config('blog.contact_email'))
                ->replyTo($data['email']);
        });
        return "Thank you for your message. It has been sent.";
    }
}
