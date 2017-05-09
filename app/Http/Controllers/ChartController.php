<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Models\Appliance;
use App\Repositories\ApplianceRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\RoomRepository;
use DB;

class ChartController extends Controller
{
    private $appRepository;
    private $categoryRepository;
    private $roomRepository;
    public function __construct(ApplianceRepository $appRepository, RoomRepository $roomRepository, CategoryRepository $categoryRepository)
    {
        $this->middleware('auth');
        $this->appRepository = $appRepository;
        $this->roomRepository = $roomRepository;
        $this->categoryRepository = $categoryRepository;
    }

    
    public function getColumnChart()
    {
        $lava = new Lavacharts;
      
        $rooms = $this->roomRepository->all();
        $appliances = $this->appRepository->all();
       
        foreach ($rooms as $item) {
            $item->countApp = DB::table('rooms')
                    ->join('appliances', 'appliances.room_id', '=', 'rooms.id')
                    ->where('room_id', $item->id)
                    ->count();
        }

        $data = $lava->DataTable();
        $data->addStringColumn('Room')
            ->addNumberColumn('Appliance');
        foreach ($rooms as $room) {
            $data->addRow([$room->name, count($room->appliances)]);
        }
        $lava->ColumnChart('Room', $data, ['title' => 'Biểu đồ thống kê số lượng thiết bị điện theo từng phòng']);

        return view('charts', compact('lava', 'rooms', 'appliances'));
    }

    public function getPieChart()
    {
        $lava = new Lavacharts; // See note below for Laravel
        $categories = $this->categoryRepository->all();
        $appliances = $this->appRepository->all();
       
        foreach ($categories as $item) {
            $item->countApp = DB::table('categories')
                    ->join('appliances', 'appliances.category_id', '=', 'categories.id')
                    ->where('category_id', $item->id)
                    ->count();
        }
        $app = $lava->DataTable();
        
        $app->addStringColumn('Category')
                   ->addNumberColumn('Appliance');
        foreach ($categories as $item) {
            $app->addRow([$item->name, count($item->appliances)]);
        }
        $lava->PieChart('Category', $app, ['title' => 'Biểu đồ số lượng thiết bị điện theo loại']);
        return view('piecharts',compact('lava', 'categories', 'appliances'));
    }

}
