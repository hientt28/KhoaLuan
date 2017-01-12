@extends('layouts.app')

@section('content')
     
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary filterable">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ trans('settings.admin_manager') }}</h3>
                        <div class="text-right">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-danger"><i class="fa fa-plus-circle"></i>&nbsp     {{ trans('settings.create') }}
                            </a>
                            <a href="{{ route('dashboard') }}" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> {{ trans("common.back") }}</a>
                            <button class="btn btn-default btn-filter">
                                <span class="fa fa-filter"></span>{{ trans('settings.filter') }}
                            </button>
                        </div>
                    </div>
                    <table class="table" id="myTable">
                        <thead>
                            <tr class="filters">
                                <th>
                                    <input type="checkbox" id="checkall"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" placeholder="{{ trans('settings.stt') }}" disabled>
                                </th>
                                <th>
                                    <input type="text" class="form-control" placeholder="{{ trans('settings.name') }}" disabled>
                                </th>
                                <th>
                                    <input type="text" class="form-control" placeholder="{{ trans('settings.email') }}" disabled>
                                </th>
                                <th>
                                    <input type="text" class="form-control" placeholder="{{ trans('settings.role') }}" disabled>
                                </th>

                                <th>
                                    <input type="text" class="form-control" placeholder="{{ trans('settings.edit') }}" disabled>
                                </th>

                                <th>
                                    <input type="text" class="form-control" placeholder="{{ trans('settings.delete') }}" disabled>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td><input type="checkbox" class="checkable"/></td>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('admin.users.edit', [ $user->id ]) }}" title="{{ trans('settings.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['admin', $user->id], 'method' => 'DELETE']) !!}
                                                {{ Form::button("<i class=\"fa fa-trash-o\"></i> ", [
                                                    'class' => 'btn btn-danger',
                                                    'onclick' => "return confirm('" . trans('settings.confirm_delete') . "')",
                                                    'type' => 'submit',
                                                ]) }}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
@endsection