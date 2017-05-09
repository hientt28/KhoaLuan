@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row page-title-row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <h3> {{ trans('category.categories') }} <small>&raquo; {{ trans('category.edit') }} </small></h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"> {{ trans('category.edit') }} </h3>
                </div>
                <div class="panel-body">

                    {!! Form::model($category, [
                        'method' => 'PUT',
                        'route' => ['categories.update', $category->id],
                        'class' => 'form-horizontal',
                    ]) !!}
                        <div class="form-group"> 
                            {!! Form::label('name', trans('category.name'), ['class' => 'col-md-3 control-label required']) !!}
                            <div class="col-md-7">
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                        </div>
                        
                        <div class="form-group"> 
                            {!! Form::label('description', trans('category.description'), ['class' => 'col-md-3 control-label required']) !!}
                            
                            <div class="col-md-7">
                                {!! Form::text('description',old('name'), ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-8">
                                {!! Form::button('<i class="fa fa-edit"></i>&nbsp;' . trans('category.update'), [
                                'type' => 'submit',
                                'class' => 'btn btn-success btn-md',
                                ]) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop
