@component('mail::message')
# Hi!

Welcome to the Blog.

Enjoy your visit and readon:

@component('mail::button', ['url' => 'http://localhost'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
Lorem ipsum dolor sit amet.
@endcomponent

Thanks,<br>	
{{ config('app.name') }}
@endcomponent
