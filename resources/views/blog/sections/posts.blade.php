<section id="posts-section">
	<h1 class="section-title">Posts</h1>
	<div class="section-content">
		<div id="categories">
			<ul id="categories-list">
				<li class="active-category-item">
					<a id="none" href="posts?page=1">
						<img src="/assets/img/code.png">
					<a>
				</li>
				<li>
					<a id="1" href="category/1/posts?page=1">
						<img src="/assets/img/code.png">
					<a>
				</li>
				<li>
					<a id="2" href="category/2/posts?page=1">
						<img style="width: 100px;" src="/assets/img/code.png">
					</a>
				</li>
				<li>
					<a id="3" href="category/3/posts?page=1">
						<img src="/assets/img/webdev.png">
					</a>
				</li>
				{{-- <li id="1">
					<figure>
						<img style="width: 100px;" src="/assets/img/code.png">
						<figcaption >Programming</figcaption>
					</figure>
				</li> --}}
			</ul>
		</div>
		<div class="flex-block">
			<input type="text" id="search-posts-input" class="form-control search-input" placeholder="Search for post:" >
			<button id="search-posts-button" class="button inline-button"><i class="fa fa-search"></i></button>
		</div>
		<div id="posts-block">
			@include("blog.partials.posts-block")
		</div>
		<div id="post-block"></div>
	</div>
</section>
