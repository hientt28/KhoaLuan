<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Room;
use App\Models\Appliance;
use Auth;

class RoomRepository extends BaseRepository
{
    public $app;
    public function __construct(Room $room, Appliance $app)
    {
        $this->model = $room;
        $this->app = $app;
    }

    public function getAllAppliance()
    {
        return $this->app->all();
    }
}
