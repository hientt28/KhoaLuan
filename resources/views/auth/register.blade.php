@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="agile-info_w3ls hvr-buzz-out">
            <h3>{{ trans('label.register') }}</h3>
            @include('errors.errors')
            <div class="agile-info_w3ls_grid">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="{{ trans('message.email_address') }}">
                    </div>
                    <div class="form-group">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="{{ trans('message.name') }}">
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="{{ trans('message.password') }}">
                    </div>
                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="{{ trans('message.confirm_password') }}">
                    </div>
                    <button type="submit">{{ trans('label.signup') }}</button>
                </form>
                <h5>{{ trans('message.already_member') }} <a href="{{ url('/login') }}">{{ trans('label.signin') }}</a></h5>
            </div>
        </div>
    </div>
</div>
@endsection
