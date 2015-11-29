<?php

namespace Blog\Http\Controllers;

use Blog\Http\Controllers\Controller;
use Blog\Http\Requests\ContactMeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
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
        Mail::queue('blog.emails.email', $data, function ($message) use ($data) {
            $message->subject('Blog Contact Form: ' . $data['name'])
                ->to(config('blog.contact_email'))
                ->replyTo($data['email']);
        });
        echo "Thank you for your message. It has been sent.";
    }
}
