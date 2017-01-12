<?php

namespace App\Repositories\Category;

use Auth;
use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository 
{

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    // public function categoryExceptParent($limit, $id)
    // {
    // 	return $this->model->where('parent_id', '<>', $id)->paginate($limit);
    // }

    // public function listCategories()
    // {
    //     $listCategories = Category::pluck('name', 'id')->all();

    //     return $listCategories;
    // }
}
