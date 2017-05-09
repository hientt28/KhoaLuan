@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">Category Detail</div>

                <div class="panel-body form-horizontal">
                    @include('errors.errors')
                    @include('errors.success')
                    <div class="col-md-8 col-md-offset-2">
                        <table class="table table-striped table-info">
                            <tbody>
                            
                            <tr>
                                <td><strong>Category Name:</strong></td>
                                <td>{{ $categories->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description:</strong></td>
                                <td><a>{{ $categories->description }}</a></td>
                            </tr>
                        
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <a href="{{ route('categories.index') }}" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i>{{ trans('common.back') }}</a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()