@component('mail::message')
# Hello {{ ucwords($user->name) }},

Your subadmin account has been created on Acadamic Coaching.
Plese click the below button to set password for you account.

@component('mail::button', ['url' => $url])
	Set Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
