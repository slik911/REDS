<x-mail::message>
<p>Hi {{$mailData['name']}} </p>

{{$mailData['body']}}

<x-mail::button :url="url('/login')">
    Login to your account
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
