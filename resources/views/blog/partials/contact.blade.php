<!-- <p>
    Want to get in touch with me? Fill out the form below to send me a
    message and I will try to get back to you within 24 hours!
</p> -->
<section id="contact-section">
    <h1 class="section-title">Contact</h1>
    <form action="/contact" method="post" id="contact-form">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="email">E-Mail Address:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
        </div>
        <div class="form-group">
            <label>Message:</label>
            <textarea rows="7" class="form-control" id="message" name="message"> {{ old('message') }} </textarea>
        </div>
        <button type="submit" id="submit-email-button" class="btn">Submit</button>
    </form>
</section>
