
@component('mail::message')
Hello user,  {{-- use double space for line break --}}
Thank you for choosing Mailtrap!

Click below to start working right now

@component('mail::button', ['url' => ''])
Go to your inbox
@endcomponent

Sincerely,
Mailtrap team.
@endcomponent