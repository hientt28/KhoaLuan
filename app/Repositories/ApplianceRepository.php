<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Appliance;
use Auth;

class ApplianceRepository extends BaseRepository
{
    
    public function __construct(Appliance $app)
    {
        $this->model = $app;
    }
}
