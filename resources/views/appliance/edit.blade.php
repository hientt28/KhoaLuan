@extends('layouts.app')

@section("content")
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>{{ trans('appliances.edit_app') }}</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> {{ trans('appliances.app_title_form') }} </h3>
                </div>
                <div class="panel-body">
                    
                    {!! Form::model($app, ['route' => ['admin.appliances.update', $app['id']], 'class' => 'form-horizontal', 'enctype' =>"multipart/form-data", 'method' => 'PUT']) !!}
                        <div class="form-group">
                            {!! Form::label('name', trans('appliances.name'), ['class' => 'col-md-3 control-label required']) !!}
                            <div class="col-md-7">
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', trans('appliances.status'), [
                                'class' => 'col-md-3 control-label'
                            ]) !!}
                            <div class="col-md-7">
                            {!! Form::select('status', config('common.status'), null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('electric_value', trans('appliances.electric_value'), ['class' => 'col-md-3 control-label required']) !!}
                            <div class="col-md-7">
                                {!! Form::text('electric_value', old('electric_value'), ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-5 col-md-offset-6">
                                {!! Form::button('<i class="fa fa-edit"></i>&nbsp;' . trans('appliances.update'), [
                                'type' => 'submit',
                                'class' => 'btn btn-success btn-md',
                                ]) !!}
                                
                                <a href="{{ route('admin.appliances.index') }}" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i>{{ trans('common.back') }}</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection