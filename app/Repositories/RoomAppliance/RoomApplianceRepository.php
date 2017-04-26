<?php

namespace App\Repositories\Schedule;

use App\Repositories\BaseRepository;
use App\Models\RoomAppliance;

class RoomApplianceRepository extends BaseRepository
{
    
    public function __construct(RoomAppliance $roomApp)
    {
        $this->model = $roomApp;
    }
    
}
