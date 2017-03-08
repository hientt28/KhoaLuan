@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 body-content">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    {{ trans('appliances.list_app') }}
                </div>

                <div class="panel-body">
                    <div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.appliances.create') }}" class="btn btn-success">
                                <i class="fa fa-plus fa-fw"></i>
                                {{ trans('appliances.create') }}
                            </a>

                            <a id="btn_del_task" class="btn btn-danger">
                                <i class="fa fa-trash-o fa-fw"></i> {{ trans('appliances.delete_multi') }}
                            </a>
                        </div>

                        <div class="col-md-6">
                            {!! Form::open(['url' => 'admin/appliances', 'method' => 'GET']) !!}

                            <div class="col-md-8 col-md-offset-1">
                                {!! Form::text('search', old('search'), [
                                    'class' => 'form-control',
                                    'placeholder' => trans('appliances.search')
                                ]) !!}
                            </div>

                            {!! Form::button('<i class="fa fa-search fa-fw"></i> ' . @trans('appliances.search'),
                                ['type' => 'submit', 'class' => 'btn btn-primary col-md-3']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div id="data_grid" class="dataTable_wrapper data_list">
                        @include('appliance.grid', ['apps' => $apps])
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection