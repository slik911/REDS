<x-mail::message>
Hi Justice,

You have received a new message from the contact form on your website.

Name: {{ $mailData['name'] }} <br/>
Email: {{ $mailData['email'] }}<br/>

Message: {{ $mailData['message'] }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
