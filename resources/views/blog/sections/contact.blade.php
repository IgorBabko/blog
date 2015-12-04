<section id="contact-section">
    <h1 class="section-title">Contact</h1>
    <form action="/contact" method="post" class="section-content" id="contact-form">
        <!-- <input type="hidden" name="_token" value="{!! csrf_token() !!}"> -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="email">E-Mail Address:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea rows="7" class="form-control" id="message" name="message"></textarea>
        </div>
        <button type="submit" class="btn button">Submit</button>
    </form>
</section>
