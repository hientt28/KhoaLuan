@extends('layouts.app')

@section('content')
    <div class="container">
        <section>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10 ">
                    <div class="panel panel-info filterable">
                        <div class="panel-heading" style=" text-align:center">
                            Bảng Giá Điện Năng Tiêu Thụ
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="filters">
                                            <th class="text-center">
                                               STT
                                            </th>
                                            
                                            <th class="text-center">
                                              Số điện (đơn vị: kWh)
                                            </th>
                                            <th class="text-center">
                                                Giá bán điện (đồng/kWh)
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center"> 1 </td>
                                            <td class="text-center">0 - 50 </td>
                                            <td class="text-center"> 1.484 </td> 
                                        </tr>
                                        <tr>
                                            <td class="text-center"> 2 </td>
                                            <td class="text-center">51 - 100 </td>
                                            <td class="text-center"> 1.533 </td> 
                                        </tr>
                                        <tr>
                                            <td class="text-center"> 3 </td>
                                            <td class="text-center">101 - 200 </td>
                                            <td class="text-center"> 1.786 </td> 
                                        </tr>
                                        <tr>
                                            <td class="text-center"> 4 </td>
                                            <td class="text-center">201 - 300 </td>
                                            <td class="text-center"> 2.242 </td> 
                                        </tr>
                                        <tr>
                                            <td class="text-center"> 5 </td>
                                            <td class="text-center">301 - 400 </td>
                                            <td class="text-center"> 2.503 </td> 
                                        </tr>
                                        <tr>
                                            <td class="text-center"> 6 </td>
                                            <td class="text-center"> 401 trở lên </td>
                                            <td class="text-center"> 2.587 </td> 
                                        </tr>
                                        
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 text-left col-md-offset-1">
                    <a href="{{ route('dashboard') }}" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> {{ trans("common.back") }}</a>
                </div>
            </div>
        </section>
    </div>
@endsection
