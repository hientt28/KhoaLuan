@extends('layouts.app')

@section('content')
    
    <div class="container">
        <section>
            <div class="row page-title-row">
                <div class="col-md-6 col-md-offset-2">
                    <h3> {{ trans('common.manager_room') }} </h3>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{ trans('common.room_table') }}
                        </div>
                        <div class="panel-body">
                            
                            <table class="table" id="myTable">
                                <thead>
                                    <tr class="filters">
                                        
                                        <th><input type="checkbox" id="checkAll"/></th>
                                        <th> {{ trans('common.id') }} </th>
                                        <th> {{ trans('common.name') }} </th>
                                        <th title="action">{{ trans('common.action') }}</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rows as $key => $row)
                                        <tr>
                                            <td><input type="checkbox" class="checkthis" name="checkbox[]" value="{{ $row->id }}"/></td>
                                            <td> {{ $row->id }} </td>
                                            <td> {{ $row->name }} </td>
                                            <td>
                                                <div class="field">
                                                    <a class="btn btn-primary" href="{{ route('rooms.edit', [ $row->id ]) }}" title="">
                                                        <i class="fa fa-edit"></i>
                                                        {{ trans('common.edit') }}
                                                    </a>

                                                    <a class="btn btn-success" href="{{ route('rooms.show', [ $row->id ]) }}" title="detail">
                                                        <i class="glyphicon glyphicon-arrow-right"></i>
                                                        {{ trans('common.detail') }}
                                                        
                                                    </a>

                                                    {!! Form::open(['route' => ['rooms.destroy', $row->id], 'method' => 'DELETE']) !!}
                                                    {{ Form::button("<i class=\"fa fa-trash-o\"></i> ", [
                                                        'class' => 'btn btn-danger',
                                                        'onclick' => "return confirm('" . trans('common.confirm_delete') . "')",
                                                        'type' => 'submit',
                                                    ]) }}
                                                    {!! Form::close() !!}
                                                </div>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination pull-right">
                            {!! $rows->links() !!}
                        </div>

                    </div>
                    <div class="col-md-7 text-left">
                        <a href="{{ route('rooms.create') }}" class="btn btn-success">
                            <i class="glyphicon glyphicon-plus-sign"></i>   
                         {{ trans('common.add_room') }} </a>
                         <a href="{{ route('dashboard') }}" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> {{ trans("common.back") }}</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
