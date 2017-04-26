@extends('layouts.app')

@section("content")
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>{{ trans('common.edit_room') }}</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> {{ trans('common.room_title_form') }} </h3>
                </div>
                <div class="panel-body">
                    
                    {!! Form::model($room, ['route' => ['admin.rooms.update', $room['id']], 'class' => 'form-horizontal', 'enctype' =>"multipart/form-data", 'method' => 'PUT']) !!}
                        <div class="form-group">
                            {!! Form::label('name', trans('label.name'), ['class' => 'control-label col-sm-2 required']) !!}
                            <div class="col-md-7">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="col-md-5 col-md-offset-6">
                                {!! Form::button('<i class="fa fa-edit"></i>&nbsp;' . trans('category.update'), [
                                'type' => 'submit',
                                'class' => 'btn btn-success btn-md',
                                ]) !!}
                                <!-- {!! Form::button('<i class="fa fa-user"></i>&nbsp;' . trans('common.save'), [
                                'type' => 'submit',
                                'class' => 'btn btn-primary',
                                ]) !!} -->
                                <a href="{{ route('admin.rooms.index') }}" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i>{{ trans('common.back') }}</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection