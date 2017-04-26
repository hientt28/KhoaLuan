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
                                <th class="text-center">
                                    <input type="checkbox" id="checkall"/>
                                </th>
                                <th class="text-center">
                                    {{ trans('settings.stt') }}
                                </th>
                                <th class="text-center">
                                   {{ trans('settings.name') }}
                                </th>
                                <th class="text-center">
                                    {{ trans('settings.email') }}
                                </th>
                                <th class="text-center">
                                    {{ trans('settings.role') }}
                                </th>

                                <th class="text-center">
                                   {{ trans('settings.edit') }}
                                </th>

                                <th class="text-center">
                                    {{ trans('settings.delete') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="checkable"/></td>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $user->name }}</td>
                                    <td class="text-center">{{ $user->email }}</td>
                                    <td class="text-center">{{ $user->role }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-success" href="{{ route('admin.users.edit', [ $user->id ]) }}" title="{{ trans('settings.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
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