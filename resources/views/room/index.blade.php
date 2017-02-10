@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 body-content">
            @if(session()->has('success') || session()->has('errors'))
                <div class="ui message {{ session()->has('success') ? ' info' : ' warning'  }}}}">
                    <div class="header">
                        {{ trans('label.notification') }}
                    </div>
                    <p>{{ session()->has('success') ? session('success') : session('errors') }}</p>
                </div>
            @endif
            <div class="ui message result-msg info" style="display:none;">
                <div class="header">
                    {{ trans('label.notification') }}
                </div>
                <p class="result-msg-content"></p>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{ trans('common.room_list') }}</h3>
                    <i class="fa fa-refresh"
                       onclick="courseBuilder.utils().redirect(&quot;{{ route('rooms.index') }}&quot;)"></i>
                </div>
                <div class="panel-body">
                    @include('room.grid')
                </div>
            </div>
        </div>
    </div>
@endsection
