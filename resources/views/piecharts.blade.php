@extends('layouts.app')

@section('content')
    <div id="chart-div"></div>
	<?= $lava->render('PieChart', 'Appliance', 'chart-div') ?>
@endsection
