@extends('layouts.app')

@section('content')
	
    <div id="chart-div"></div>
	<?= $lava->render('DonutChart', 'Appliance', 'chart-div') ?>
@endsection
