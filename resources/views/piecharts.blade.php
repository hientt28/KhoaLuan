

@extends('layouts.app')

@section('content')
<div class="row col-md-offset-0">
	
    <div class="col-md-6">
	    <div class="panel panel-info">
	        <div class="panel-heading" style=" text-align:center">
	            Thống Kê Số Lượng Thiết Bị Điện Theo Từng Loại
	        </div>
	        <!-- /.panel-heading -->
	        <div class="panel-body">
	            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

	                <thead>
	                    <tr>
	                        <th>Tổng số thiết bị điện</th>
	                        <td><a href="">{{ $appliances->count() }}</a></td>
	                              
	                    </tr>
	                    @foreach($categories as $item)
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
            	<div id="chart-div"></div>
				<?= $lava->render('PieChart', 'Category', 'chart-div') ?> 
            </div>
        </div>
    	
    </div>
</div>   
@endsection
