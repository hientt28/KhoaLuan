@extends('layouts.app')

@section('content')
     <div class="container">
        <section>
            <div class="row page-title-row">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <h3> {{ trans('category.categories') }} <small>&raquo;
                        {{ trans('category.listing') }} </small>
                    </h3>
                </div>
                <!-- <div class="col-md-6 text-right">
                    <a href="{{ route('categories.create') }}"
                        class="btn btn-success">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </div> -->
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10 ">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            {{ trans('category.table') }}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr class="filters">
                                                <th>
                                                    <input type="checkbox" id="checkAll">
                                                </th>
                                                <th>
                                                   {{ trans('category.id') }}
                                                </th>
                                                
                                                <th>
                                                   {{ trans('category.name') }}
                                                </th>
                                                <th>
                                                    {{ trans('category.description') }}
                                                </th>
                                                <th> 
                                                    {{ trans('category.action') }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td><input type="checkbox" name="checkbox[]" value="{{ $category->id }}"></td>
                                                    <td>{{ $category->id }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->description }}</td>
                                                    <td>
                                                        <div class="field">
                                                            <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}" title="">
                                                                <i class="fa fa-edit"></i>
                                                                {{ trans('common.edit') }}
                                                            </a>
                                                            {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
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

                        </div>
                    </div>

                    <div class="paginate pull-right">
                        {{ $categories->render() }}
                    </div>
                </div>
                <div class="col-md-7 text-left col-md-offset-1">
                    <a href="{{ route('categories.create') }}" class="btn btn-success">
                        <i class="glyphicon glyphicon-plus-sign"></i>   
                    </a>
                    <a href="{{ route('dashboard') }}" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> {{ trans("common.back") }}</a>
                </div>
            </div>
        </section>
    </div>
@endsection
