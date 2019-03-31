@component('mail::message')
# {{ $projectProposal->title }}
@component('mail::button', ['url' => 'http://bard.inflack.com'])
@lang('')
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent