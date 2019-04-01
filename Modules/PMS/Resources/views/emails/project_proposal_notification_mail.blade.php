@component('mail::message')
# {{ $projectProposal->title }}
{{ $message }}
@component('mail::button', ['url' => $url])
@lang('pms::project_proposal.view_changes')
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent