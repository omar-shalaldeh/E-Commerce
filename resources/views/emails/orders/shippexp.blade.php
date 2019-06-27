@component('mail::message')
# Introduction
order has been shipped
your total price {{$total}}


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
