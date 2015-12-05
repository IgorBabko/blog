<section id="posts-section">
	<h1 class="section-title">Posts</h1>
	<div class="section-content">
		<div id="categories">
			<ul id="categories-list">
				<li>
					<a id="1" href="category/2/posts?page=1">
						<figure class="laravel">
							<div class="category-img-wrapper">
								<img src="/assets/img/laravel.png" alt="laravel">
							</div>
							<figcaption>Laravel</figcaption>
						</figure>
					</a>
				</li>
				<li>
					<a id="2" href="category/3/posts?page=1">
						<figure class="nodejs">
							<div class="category-img-wrapper">
								<img src="/assets/img/nodejs.png" alt="nodejs">
							</div>
							<figcaption>NodeJS</figcaption>
						</figure>
					</a>
				</li>
				<li>
					<a id="3" href="category/1/posts?page=1">
						<figure class="meteor">
							<div class="category-img-wrapper">
								<img src="/assets/img/meteor.png" alt="meteorjs">
							</div>
							<figcaption>MeteorJS</figcaption>
						</figure>
					</a>
				</li>
				<li>
					<a id="4" href="category/1/posts?page=1">
						<figure class="jquery">
							<div class="category-img-wrapper">
								<img src="/assets/img/jquery.png" alt="jquery">
							</div>
							<figcaption>jQuery</figcaption>
						</figure>
					</a>
				</li>
			</ul>
		</div>
        <form action="/search/post" id="post-search" class="search">
    		<div class="form-group">
    			<input class="form-control" name="post-search" placeholder="Search for post:">
                <i class="fa fa-search"></i>
                <!-- <span></span> -->
    		</div>
    	</form>
		<div id="posts-block">
			@include("blog.partials.posts-block")
		</div>
		<div id="post-block"></div>
	</div>
</section>
