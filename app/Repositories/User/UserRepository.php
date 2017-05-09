<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository
{
    
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function search($term)
    {
        return $this->model->where('id', 'LIKE', '%' . $term . '%')
            ->orWhere('name', 'LIKE', '%' . $term . '%')
            ->orWhere('email', 'LIKE', '%' . $term . '%')
            ->orWhere('role', 'LIKE', '%' . $term . '%')
            ->paginate(config('common.paginate_document_per_page'));
    }
    
}
