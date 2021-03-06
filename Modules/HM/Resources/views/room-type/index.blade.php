@extends('hm::layouts.master')
@section('title', __('hm::roomtype.title'))
@section('content')
    <section id="room-type-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('hm::roomtype.card_title')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{url(route('room-types.create'))}}" class="btn btn-primary btn-sm"><i
                                    class="ft-plus white"></i>{{trans('hm::roomtype.create_button')}}</a>

                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table id="room-type" class="table table-striped table-bordered alt-pagination">
                                <thead>
                                <tr>
                                    <th>{{trans('labels.serial')}}</th>
                                    <th>{{trans('labels.name')}}</th>
                                    <th>{{trans('hm::roomtype.capacity')}}</th>
                                    <th>{{trans('hm::roomtype.general_rate')}}</th>
                                    <th>{{trans('hm::roomtype.govt_rate')}}</th>
                                    <th>{{trans('hm::roomtype.bard_emp_rate')}}</th>
                                    <th>{{trans('hm::roomtype.special_rate')}}</th>
                                    <th>{{trans('labels.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roomTypes as $type)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{$type->name}}</td>
                                        <td>{{$type->capacity}}</td>
                                        <td>{{$type->general_rate}} &#2547;</td>
                                        <td>{{$type->govt_rate}} &#2547;</td>
                                        <td>{{$type->bard_emp_rate}} &#2547;</td>
                                        <td>{{$type->special_rate}} &#2547;</td>
                                        <td>
                                            <span class="dropdown">
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                              <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="{{URL::to( '/hm/room-types/'.$type->id.'/edit')}}" class="dropdown-item"><i class="ft-edit-2"></i> {{trans('labels.edit')}}</a>
                                                <div class="dropdown-divider"></div>
                                                  {!! Form::open([
                                                  'method'=>'DELETE',
                                                  'url' => [ '/hm/room-types', $type->id],
                                                  'style' => 'display:inline'
                                                  ]) !!}
                                                  {!! Form::button('<i class="ft-trash"></i> '.trans('labels.delete'), array(
                                                  'type' => 'submit',
                                                  'class' => 'dropdown-item',
                                                  'title' => 'Delete the room type',
                                                  'onclick'=>'return confirm("Confirm delete?")',
                                                  )) !!}
                                                  {!! Form::close() !!}
                                              </span>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

