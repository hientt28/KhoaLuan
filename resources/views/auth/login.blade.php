@extends('layouts.auth')

@section('content')
<div class="container">
    @include('errors.errors')
    <div class="row">
        <div class="agile-info_w3ls agile-info_w3ls_sub hvr-buzz-out" id="margin-login">
            <h3>{{ trans('label.login') }}</h3>
            <div class="agile-info_w3ls_grid second">
                <form action="{{ url('/login') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                    </div>
                    <div class="agile_remember">
                        <div class="agile_remember_left">
                            <div class="check">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>{{ trans('label.remember') }}</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit">{{ trans('label.signin') }}</button>
                </form>
                <h4>{{ trans('label.continue_with') }}</h4>
                <div class="bottom">
                    <a class="btn btn-primary btn-sm" rel="publisher"
                       href="">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-primary btn-twitter btn-sm" href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher"
                       href="#">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </div>
                <h5>{{ trans('message.signup_account') }} <a href="{{ url('/register') }}">{{ trans('label.signup') }}</a></h5>
                <div class="agile_remember_right">
                    <a href="">
                        {{ trans('label.forgot_password') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
