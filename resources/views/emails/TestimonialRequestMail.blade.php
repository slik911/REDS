<x-mail::message>
Hi {{ $mailData['name'] }},

We hope you enjoyed working with First Vision Contracting! If you have a moment, we’d really appreciate it if you could share a short testimonial about your experience. Your feedback helps us grow and lets others know what to expect.

Feel free to reply to this email or send a few lines when convenient. Thanks again for choosing us!

<x-mail::button :url="route('feedback.show', ['uuid' => $mailData['uuid']])">
Share Your Feedback
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
