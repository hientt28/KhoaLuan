@extends('layouts.app')

@section('content')

<div class="panel panel-">
        <div class="panel-heading">
            {{ trans('common.dashboard_table') }}
        </div>
        <div class="panel-body">
            
            <table class="table" id="myTable">
            	<ol class="breadcrumb">
	            	<li><a href="{{ route('rooms.index') }}"> {{ trans('label.manage_room') }} </a></li>
	            </ol>

	            <ol class="breadcrumb">
	            	<li><a href="{{ route('categories.index') }}"> {{ trans('label.manage_categories') }} </a></li>
	            </ol>

	            <ol class="breadcrumb">
	            	<li><a href="{{ route('admin.users.index') }}"> {{ trans('label.manage_user') }} </a></li>
	            </ol>

	            <ol class="breadcrumb">
	            	<li><a href="#"> {{ trans('label.assign_kwh_price') }} </a></li>
	            </ol>
				  
            </table>
        </div>

    </div>
</div>
@endsection