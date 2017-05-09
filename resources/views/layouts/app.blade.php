<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show


<body class="skin-blue sidebar-mini">
	<div class="wrapper">

	    @include('layouts.partials.mainheader')
	    
	    @include('layouts.partials.sidebar')

	   
	    @if (!Auth::guest())
	        <div class="content-wrapper">

		        @include('layouts.partials.contentheader')
		        
		        @yield('main-content')
		       
		    </div><!-- /.content-wrapper -->
	    @else
	        @yield('content')
	    @endif
	    <!-- Content Wrapper. Contains page content -->
	    @section('scripts')
		    @include('layouts.partials.scripts')
		@show

	</div><!-- ./wrapper -->
</body>
</html>
