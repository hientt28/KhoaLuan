<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Schedule;

class ScheduleRepository extends BaseRepository
{
    public $schedule;
    public function __construct(Schedule $schedule)
    {
        $this->model = $schedule;
    }
}
