@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    {{ trans('appliances.list_app') }}
                </div>

                <div class="panel-body">
                    <div id="data_grid" class="dataTable_wrapper data_list">
                        @include('admin.appliance.grid', ['apps' => $apps])
                     
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection