<section id="posts-section">
	<h1 class="section-title">Posts</h1>
	<div class="section-content">
		<div id="categories">
			<ul id="categories-list">
				<li id="active-category-item">
						<img src="/assets/img/code.png">
				</li>
				<li>
					<figure>
						<img style="width: 100px;" src="/assets/img/code.png">
						<figcaption >General</figcaption>
					</figure>
				</li>
				<li>
					{{-- <figure> --}}
						<img src="/assets/img/webdev.png">
						{{-- <figcaption >Education</figcaption> --}}
					{{-- </figure> --}}
				</li>
				<li>
					<figure>
						<img style="width: 100px;" src="/assets/img/code.png">
						<figcaption >Programming</figcaption>
					</figure>
				</li>
			</ul>
		</div>
		<div class="flex-block">
			<input type="text" class="form-control search-input" placeholder="Search for post:" >
			<button class="button inline-button"><i class="fa fa-search"></i></button>
		</div>
		<div id="posts-block">
			@include("partials.posts-block")
		</div>
		<div id="post-block"></div>
	</div>
</section>
