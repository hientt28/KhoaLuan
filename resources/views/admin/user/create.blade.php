@extends('layouts.app')

@section('content')

<div id="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-7 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ trans('settings.create_user') }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="page-header">
                            {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}
                                <div class="form-group">
                                    {!! Form::label('name', trans('settings.name'), [
                                        'class' => 'col-sm-3 control-label'
                                    ]) !!}
                                    {!! Form::text('name', null, [
                                        'class' => 'form-control',
                                        'id' => 'name',
                                        'autofocus',
                                    ]) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('email', trans('settings.email'), [
                                        'class' => 'col-md-4 control-label'
                                    ]) !!}
                                    {!! Form::email('email', '', ['class' => 'form-control', 'required' => true ]) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('role', trans('settings.role'), [
                                        'class' => 'col-md-12 control-label'
                                    ]) !!}
                                    {!! Form::select('role', config('common.user_role'), null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('password', trans('settings.password'), [
                                        'class' => 'col-md-4 control-label'
                                    ]) !!}
                                    {!! Form::password('password', ['class' => 'form-control', 'required' => true]) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection