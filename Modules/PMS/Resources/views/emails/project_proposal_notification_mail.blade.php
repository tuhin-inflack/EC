@component('mail::message')
# {{ $projectProposal->title }}
{{ $message }}
@component('mail::button', ['url' => $url])
@lang('labels.details')
@endcomponent
@lang('labels.thanks'),<br>
{{ config('app.name') }}
@endcomponent