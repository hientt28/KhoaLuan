@extends('layouts.app')

@section('content')
<div class="row col-md-offset-0">
	
    <div class="col-md-6">
	    <div class="panel panel-info">
	        <div class="panel-heading" style=" text-align:center">
	            Thống Kê Số Lượng Thiết Bị Điện Theo Từng Phòng
	        </div>
	        <!-- /.panel-heading -->
	        <div class="panel-body">
	            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

	                <thead>
	                    <tr>
	                        <th>Tổng số thiết bị điện</th>
	                        <td><a href="">{{ $appliances->count() }}</a></td>
	                              
	                    </tr>
	                    @foreach($rooms as $item)
	                    <tr>
	                        <th>{{ $item->name }}</th>
	                        <td>{{ $item->countApp }}</td>     
	                    </tr>
	                    @endforeach()
	                </thead>
	               
	            </table>
	        </div>
	    </div>
    </div>

    <div class="col-md-6 ">
    	 <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title" style=" text-align:center"> Biểu Đồ </h3>
            </div>
            <div class="panel-body">
            	<div id="temps_div" style="border:1px solid black; margin:auto"></div>
    			<?= $lava->render('ColumnChart', 'Room', 'temps_div') ?>   
            </div>
        </div>
    	
    </div>
</div>   
@endsection
