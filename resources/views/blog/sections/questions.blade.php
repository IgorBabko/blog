<section id="questions-section">
	<h1 class="section-title">Questions</h1>
	<form id="question-form">
		<div class="form-group">
			<label for="phone">Question title:</label>
			<input type="text" class="form-control" id="question-input" value="{{ old('questionTitle') }}" placeholder="Question's subject">
		</div>
		<div class="form-group">
			<label for="message">Question:</label>
			<textarea rows="7" class="form-control" id="question" name="question" placeholder="Your question goes here:"> {{ old('question') }} </textarea>
		</div>
		<button type="submit" class="btn" id="ask-question-button">Ask</button>
	</form>
	<div class="section-content">
		<div id="questions-block">
			@include('blog.partials.questions-block')
		</div>
		<div id="question-block"></div>
	</div>
</section>
