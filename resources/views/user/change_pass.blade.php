@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Change Password</div>

                <div class="panel-body">
                    @include('errors.errors')
                    
                    {!! Form::open(['route' => 'update_password', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                        {!! Form::label('old_password', trans('auth.old_password')) !!}
                        {!! Form::password('old_password', ['class' => 'form-control', 'placeholder' => trans('auth.old_password_placeholder')]) !!}

                        {!! Form::label('password', trans('auth.new_password')) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('auth.new_password_placeholder')]) !!}

                        {!! Form::label('password_confirmation', trans('auth.password_confirm_label')) !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('auth.new_password_confirm')]) !!}

                        <br>

                        <br>

                        {!! Form::button('<i class="fa fa-check-square" aria-hidden="true"></i> ' . trans('auth.change_password_button'), ['type' => 'submit', 'class' => 'btn btn-success']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()