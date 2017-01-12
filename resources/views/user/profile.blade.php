@extends('layouts.app')

@section("content")
    <div class="page-content-wrapper">
        <h3 class="page-header"> {{ trans('label.edit_profile') }} </h3>
        <div class="row">
            {!! Form::model($user, ['method' => 'PUT', 'route' => ['user.update', $user->id], 'class' => 'form-horizontal', 'files' => true]) !!}
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="text-center">
                        {!! Form::image($user->avatar, null, ['class' => 'img-circle']) !!}
                        <h6> {{ trans('label.avatar') }} </h6>
                        {!! Form::file('avatar', ['class' => 'text-center center-block well well-sm']) !!}
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 personal-info">
                    <h4> <b>{{ trans('label.information') }}</b></h4>
                    <div class="form-group">
                        {!! Form::label('name', trans('label.name'), ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-8 input-group">
                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            {!! Form::text('name', $user->name, ['class' => 'form-control', 'autofocus']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('address', trans('label.address'), ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-8 input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone', trans('label.phone'), ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-8 input-group">
                            <span class="input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                            {!! Form::text('phone', $user->phone, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', trans('label.email'), ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-8 input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-8">
                            {!! Form::button('<i class="fa fa-edit"></i>&nbsp;' . trans('label.update_profile'), [
                                'type' => 'submit',
                                'class' => 'btn btn-primary btn-md'
                            ]) !!}
                            <a href="{{ route('home') }}" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> {{ trans('label.cancel') }}</a>
                            
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection