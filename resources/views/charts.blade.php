@extends('layouts.app')

@section('content')
     <div id="temps_div" style="width:1000px;border:1px solid black; margin:auto"></div>
        
    <?= $lava->render('ColumnChart', 'Room', 'temps_div') ?>
@endsection
