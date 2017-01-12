@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">

					<div class="panel-body" style="font-size:30px; text-align:center; color:red;" >
						<b>{{ trans('label.welcome') }}</b>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
