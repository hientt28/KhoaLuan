@extends('layouts.app')

@section("content")
	<div class="container">
		<section>
			<div class="row page-title-row">
				<div class="col-md-7 col-md-offset-2">
					<h3> {{ trans('common.room_detail') }} </h3>
					<a href="{{ route('admin.rooms.index') }}" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i>{{ trans('common.back') }}</a>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-md-7 col-md-offset-2">
					<div class="panel panel-primary">
						<div class="panel-heading">
							{{ trans('common.room_table') }}
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="user-information">
								<div>
									<span class="information-label"><strong>{{ trans('label.name') }}</strong></span>
									<span>{{ $rooms['name'] }}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection
