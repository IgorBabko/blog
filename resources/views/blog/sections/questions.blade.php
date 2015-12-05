<section id="questions-section">
	<h1 class="section-title">Questions</h1>
	<div class="section-content">
		<form id="question-form">
			<div class="form-group">
				<label for="question-title">Question title:</label>
				<input type="text" class="form-control" id="question-title">
			</div>
			<div class="form-group">
				<label for="message">Question:</label>
				<textarea rows="7" class="form-control" id="question" name="question"></textarea>
			</div>
			<button type="submit" class="btn button">Ask</button>
		</form>
        <form action="/search/question" id="question-search" class="search">
    		<div class="form-group">
    			<input class="form-control" name="question-search" placeholder="Search for question:">
                <i class="fa fa-search"></i>
                <!-- <span></span> -->
    		</div>
    	</form>
		<div id="questions-block">
			@include('blog.partials.questions-block')
		</div>
		<div id="question-block"></div>
	</div>
</section>
