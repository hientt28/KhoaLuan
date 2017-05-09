@extends('layouts.app')

@section('content')
     <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3> {{ trans('appliances.add_app') }}</h3>
            </div>
        </div>
     </div>

    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"> {{ trans('appliances.app_title_form') }} </h3>
                </div>
                <div class="panel-body">
                    
                    {!! Form::open(['route' => ['rooms.appliances.store', $room->id], 'method' => 'post', 'class' => 'form-horizontal']) !!}
                        <div class="form-group">
                            {!! Form::label('name', trans('appliances.name'), ['class' => 'col-md-3 control-label required']) !!}
                            <div class="col-md-7">
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('category_id', trans('category.choose_category'), ['class' => 'col-md-3 control-label required']) !!}
                            <div class="col-md-7">
                                {!! Form::select('category_id', $catsList, null,  ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', trans('appliances.status'), [
                                'class' => 'col-md-3 control-label'
                            ]) !!}
                            <div class="col-md-7">
                            {!! Form::select('status', config('common.status'), 1, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <!--  -->
                        <div class="form-group">
                            {!! Form::label('electric_value', trans('appliances.electric_value'), ['class' => 'col-md-3 control-label required']) !!}
                            <div class="col-md-7">
                                {!! Form::text('electric_value', old('electric_value'), ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-7">
                                {{ Form::button('<i class="fa fa-btn fa-user"></i> ' . trans('common.save'), ['type' => 'submit', 'class' => 'btn btn-primary']) }}
                                <a href="{{ route('rooms.index') }}" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> {{ trans("common.back") }}</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
