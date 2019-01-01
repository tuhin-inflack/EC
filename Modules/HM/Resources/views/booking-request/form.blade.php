@if($page == 'create')
    {!! Form::open(['route' =>  'booking-requests.store', 'class' => 'booking-request-tab-steps wizard-circle', 'enctype' => 'multipart/form-data']) !!}
@else
    {!! Form::open(['route' =>  'booking-requests.update', 'class' => 'booking-request-tab-steps wizard-circle', 'enctype' => 'multipart/form-data']) !!}
    @method('PUT')
@endif
<!-- Logic for handling booking from multiple place -->
@if($bookingType)
    <input type="hidden" name="booking_type" value="{{$bookingType}}"/>
@endif
<!-- Step 1 -->
@include('hm::booking-request.partials.form.step-1')
<!-- Step 2 -->
@include('hm::booking-request.partials.form.step-2')
<!-- Step 3 -->
@include('hm::booking-request.partials.form.step-3')
<!-- Step 4 -->
@include('hm::booking-request.partials.form.step-4')
{!! Form::close() !!}

