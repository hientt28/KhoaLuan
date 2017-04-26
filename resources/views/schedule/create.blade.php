@extends('layouts.app')

@section('content')
     <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3> Add Schedule</h3>
            </div>
        </div>
     </div>

    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> Schedule Title Form}} </h3>
                </div>
                <div class="panel-body">
                    
                    {!! Form::open(['route' => 'schedules.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                        <div class="form-group">
                            {!! Form::label('todo', 'To Do', [
                                'class' => 'col-md-3 control-label'
                            ]) !!}
                            <div class="col-md-7">
                            {!! Form::select('todo', config('common.to_do'), 0, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('state', trans('appliances.status'), [
                                'class' => 'col-md-3 control-label'
                            ]) !!}
                            <div class="col-md-7">
                            {!! Form::select('state', config('common.state'), 0, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-7">
                                {{ Form::button('<i class="fa fa-btn fa-user"></i> ' . trans('common.save'), ['type' => 'submit', 'class' => 'btn btn-primary']) }}
                                <a href="{{ route('schedules.index') }}" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> {{ trans("common.back") }}</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
