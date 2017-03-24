@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">{{ trans('label.edit_profile') }}</div>

                <div class="panel-body">
                    @include('errors.errors')
                    {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id], 'class' => 'form-horizontal', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('avatar', trans('label.avatar'), ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::file('avatar', ['id' => 'image']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::image($user->avatar, null, ['class' => 'img-circle']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', trans('label.name'), ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', isset($user['name']) ? $user['name'] : '', ['class' => 'form-control', 'id' => 'name']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('address', trans('label.address'), ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('address', isset($user['address']) ? $user['address'] : '', ['class' => 'form-control', 'id' => 'address']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone', trans('label.phone'), ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('phone', isset($user['phone']) ? $user['phone'] : '', ['class' => 'form-control', 'id' => 'phone']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                        {!! Form::label('email', trans('label.email'), ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                {!! Form::submit(trans('label.save'), ['class' => 'btn btn-info']) !!}
                                {!! Form::reset(trans('label.reset'), ['class' => 'btn btn-default']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()