<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\CreateAppRequest;
use App\Repositories\RoomRepository;
use App\Repositories\ApplianceRepository;
use App\Models\Room;
use App\Models\Appliance;
use App\Models\Category;

class RoomController extends Controller
{
    private $roomRepository;
    private $appRepository;

    public function __construct(RoomRepository $roomRepository, ApplianceRepository $appRepository)
    {
        $this->roomRepository = $roomRepository;
        $this->appRepository = $appRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $rows = $this->roomRepository->paginate(trans('common.limit'));
        return view('room.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resourc
     *
     * @return Response
     */
    public function create()
    {
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(RoomRequest $request)
    {
        $newRoom = $request->only('name');
        
        try {
            $data = $this->roomRepository->create($newRoom);
        } catch (Exception $e) {
            return redirect()->route('rooms.index')->withError($e->getMessage());
        }

        return redirect()->route('rooms.index')->withSuccess(trans('message.create_user_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $rooms = $this->roomRepository->showById($id);
        } catch (Exception $ex) {
            return redirect()->route('rooms.index')->withError($ex->getMessage());
        }

        return view('room.show', compact('rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        try {
            $room = $this->roomRepository->showById($id);
        } catch (Exception $e) {
            return redirect()->route('rooms.index')->withError($e->getMessage());
        }

        return view('room.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, $id)
    {
        $requestOnly = $request->only('name');
        $this->roomRepository->updateById($requestOnly, $id);

        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $data = $this->roomRepository->deleteById($id);
        } catch (Exception $e) {
            return redirect()->route('rooms.index')->withError($e->getMessage());
        }

        return redirect()->route('rooms.index');
    }

    //Add Appliances belongsTo Room
    public function getcreateApp($id) {
        $room = Room::find($id);
        $catsList = Category::lists('name','id');
        return view('user.appliance.create', compact('room', 'catsList'));
    }

    public function createApp(CreateAppRequest $request, $id){
        $room = Room::find($id);
        $category = Category::find($id);
        $app = new Appliance();
        $app->name = $request->name;
        $app->status = $request->status;
        $app->electric_value = $request->electric_value;
        $app->room_id = $room->id;
        $app->category_id = $category->id;
        $app->save();

        return redirect()->action('RoomController@index')->with('success', trans('session.appliance_create_success'));
    }



}
