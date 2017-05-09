
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">{{ trans('label.information') }}</div>

                <div class="panel-body form-horizontal">
                    @include('errors.errors')
                    @include('errors.success')
                    <div class="col-md-6 col-md-offset-3">
                        <table class="table table-striped table-info">
                            <tbody>
                            <tr>
                                <td><strong>{{ trans('label.avatar') }}:</strong></td>
                                <td>
                                    <img src="{{ url($user['avatar']) }}" class="img-thumbnail img-row">
                                </td>
                            </tr>
                            <tr>
                                <td><strong>{{ trans('label.name') }}:</strong></td>
                                <td><i class="fa fa-user"></i> {{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ trans('label.email') }}:</strong></td>
                                <td><i class="fa fa-envelope-o"></i> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                            </tr>
                            <tr>
                                <td><strong>{{ trans('label.address') }}:</strong></td>
                                <td><i class="fa fa-map-marker"></i>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ trans('label.phone') }}:</strong></td>
                                <td><i class="fa fa-mobile"></i>{{ $user->phone }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-7">
                            <a class="btn btn-info" href="{{ action('UserController@edit', [$user->id]) }}">
                                {{ trans('label.update_profile') }}
                            </a>
                            <a class="btn btn-info" href="{{ action('HomeController@changepass', [$user->id]) }}">
                                Change Password
                            </a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()