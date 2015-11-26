<section id="questions-section">
	<h1 class="section-title">Questions</h1>
	<div class="section-content">
		<form id="question-form">
			<input type="text" class="form-control" id="question-input" placeholder="Question's subject">
			<textarea class="question-textarea">Your question goes here:</textarea>
			<button class="button">Ask</button>
		</form>
		<div class="flex-block">
			<input type="text" id="search-questions-input" class="form-control search-input" placeholder="Search for question:" >
			<button id="search-questions-button" class="button inline-button"><i class="fa fa-search"></i></button>
		</div>
		<div id="questions-block">
			@include('blog.partials.questions-block')
		</div>
		<div id="question-block"></div>
	</div>
</section>
