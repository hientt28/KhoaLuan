@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">
                    {{ trans('appliances.list_app') }}
                </div>

                <div class="panel-body">
                    <div id="data_grid" class="dataTable_wrapper data_list">
                        @include('user.appliance.grid', ['apps' => $apps])
                     
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-10 text-left col-md-offset-1"> 
            <a href="{{ route('rooms.index') }}" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i>{{ trans('common.back') }}</a>
        </div>
    </div>

@endsection