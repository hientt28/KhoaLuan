<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Models\Appliance;
use App\Repositories\ApplianceRepository;
use App\Repositories\RoomRepository;

class ChartController extends Controller
{
    private $appRepository;
    private $roomRepository;
    public function __construct(ApplianceRepository $appRepository, RoomRepository $roomRepository)
    {
        $this->middleware('auth');
        $this->appRepository = $appRepository;
        $this->roomRepository = $roomRepository;
    }
    public function getColumnChart()
    {
     	$lava = new Lavacharts;
  //       $apps = $this->appRepository->all();
  //      // dd($apps);
  //       $data = $lava->DataTable();
  //       $data->addStringColumn('Appliance Name')
  //           ->addNumberColumn('Electric Value');

  //       foreach ($apps as $app) {
  //           $data->addRow([$app->name, $app->electric_value]);
           
  //       }
		// $lava->ColumnChart('Appliance', $data, ['title' => 'ColumnChart Of Appliance Value']);

  //       return view('charts', compact('lava'));
        $rooms = $this->roomRepository->all();
        $data = $lava->DataTable();
        $data->addStringColumn('Room')
            ->addNumberColumn('Appliance');
        foreach ($rooms as $room) {
            $data->addRow([$room->name, count($room->appliances)]);
        }
        $lava->ColumnChart('Room', $data, ['title' => 'ColumnChart Of Appliance Count In Room']);

        return view('charts', compact('lava'));
    }

    public function getDonutChart()
    {
    	$lava = new Lavacharts; // See note below for Laravel

		$app = $lava->DataTable();
		$data = Appliance::select("name as 0","electric_value as 1")->get()->toArray();

		$app->addStringColumn('Appliance Name')
		           ->addNumberColumn('Electric Value')
		           ->addRows($data);
		$lava->DonutChart('Appliance', $app, ['title' => 'DonutChart Of Appliance Value']);

        return view('donutcharts',compact('lava'));
    }

    public function getPieChart()
    {
        $lava = new Lavacharts; // See note below for Laravel

        $app = $lava->DataTable();
        $data = Appliance::select("name as 0","electric_value as 1")->get()->toArray();

        $app->addStringColumn('Appliance Name')
                   ->addNumberColumn('Electric Value')
                   ->addRows($data);
        $lava->PieChart('Appliance', $app, ['title' => 'DonutChart Of Appliance Value']);

        return view('piecharts',compact('lava'));
    }

}
