@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                {{ trans('label.schedule') }}
            </div>
            <div class="panel-body">
                <table class="table" id="myTable">
                    <div class = "col-lg-8">
                        @include('errors.success')
                    </div>

                    <thead>
                        <tr>
                            <th>Appliance ID</th>
                            <th>Appliance Name</th>
                            <th>Room</th>
                            <th>Time</th>
                            <th>To Do</th>
                            <th>Status</th>
                            <th>Activation Action</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->appliance->id }}</td>
                            <td>{{ $schedule->appliance->name }}</td>
                            <td>{{ $schedule->appliance->room->name }}</td>
                            <td>{{ $schedule->created_at }}</td>
                            <td>{!! fill_todo($schedule->todo) !!}</td>
                            <td>{!! fill_state($schedule->state) !!}</td>
                            <td></td>
                            <td>
                                <a class="btn btn-primary" href="" title="">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    {{ trans('common.edit') }}
                                </a>
                            </td>
                            <td>
                                <!-- {!! Form::open(['method' => 'DELETE', 'route' => ['admin.departments.users.delete',$user->id]]) !!}
                                {{ Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ' . 'Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure to delete ?')"]) }}
                                {!! Form::close() !!} -->
                            </td>
                            
                        </tr>
                      @endforeach()
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    <div class="col-md-7 text-left">
        <a href="{{ route('schedules.create') }}" class="btn btn-success">
            <i class="glyphicon glyphicon-plus-sign"></i>   
         Add Schedule </a>
        <a href="{{ route('dashboard') }}" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> {{ trans("common.back") }}</a>
    </div>
</div>
@endsection()