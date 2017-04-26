@extends('layouts.app')

@section('content')
    
    <div class="container">
        <section>
            <div class="row page-title-row">
                <div class="col-md-6 col-md-offset-1">
                    <h3> {{ trans('common.manager_room') }} </h3>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-9 col-md-offset-1">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{ trans('common.room_table') }}
                        </div>
                        <div class="panel-body">
                            
                            <table class="table" id="myTable">
                                <thead>
                                    <tr class="filters">
                                        
                                        <th class="text-center"><input type="checkbox" id="checkAll"/></th>
                                        <th class="text-center"> {{ trans('common.id') }} </th>
                                        <th class="text-center"> {{ trans('common.name') }} </th>
                                        <th class="text-center"> {{ trans('common.add_app') }} </th>
                                        <th class="text-center">{{ trans('common.action') }}</th>
                                        <th class="text-center">{{ trans('common.delete') }}</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rows as $row)
                                        <tr>
                                            <td class="text-center"><input type="checkbox" class="checkthis" name="checkbox[]" value="{{ $row->id }}"/></td>
                                            <td class="text-center"> {{ $row->id }} </td>
                                            <td class="text-center"><a href="{{ route('admin.rooms.appliances.list',[$row->id ]) }}"> {{ $row->name }}</a> </td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('admin.rooms.appliances.create', $row->id) }}" role="button"><i class="fa fa-plus-circle"></i> {{ trans('common.add_app') }} </a>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-primary" href="{{ route('admin.rooms.edit', [ $row->id ]) }}" title="">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                    {{ trans('common.edit') }}
                                                </a>

                                                <a class="btn btn-success" href="{{ route('admin.rooms.show', [ $row->id ]) }}" title="detail">
                                                    <span class="glyphicon glyphicon-arrow-right"></span>
                                                    {{ trans('common.detail') }}
                                                    
                                                </a>

                                            </td>
                                            <td class="text-center">
                                                 {!! Form::open(['route' => ['admin.rooms.destroy', $row->id], 'method' => 'DELETE']) !!}
                                                    {{ Form::button("<i class=\"fa fa-trash-o\"></i> ", [
                                                        'class' => 'btn btn-danger',
                                                        'onclick' => "return confirm('" . trans('common.confirm_delete') . "')",
                                                        'type' => 'submit',
                                                    ]) }}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination pull-right">
                            {{ $rows->links() }}
                        </div>  

                    </div>
                    <div class="col-md-7 text-left">
                        <a href="{{ route('admin.rooms.create') }}" class="btn btn-success">
                            <i class="glyphicon glyphicon-plus-sign"></i>   
                         {{ trans('common.add_room') }} </a>
                        <a href="{{ route('dashboard') }}" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> {{ trans("common.back") }}</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection