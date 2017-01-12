<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Room;
use Auth;

class RoomRepository extends BaseRepository
{
    
    public function __construct(Room $room)
    {
        $this->model = $room;
    }
}
