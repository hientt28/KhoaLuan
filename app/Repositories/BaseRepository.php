<?php

namespace App\Repositories;

use Exception;
use DB;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function count()
    {
        return $this->model->count();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function paginate($limit)
    {
        return $this->model->paginate($limit);
    }

    public function showById($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) {
            throw new Exception(trans('message.item_not_exist'));
        }

        return $data;
    }

    public function create($input)
    {
        $data = $this->model->create($input);
        if (!$data) {
            throw new Exception(trans('message.create_error'));
        }

        return $data;
    }


    public function updateById($inputs, $id)
    {
        $data = $this->model->where('id', $id)->update($inputs);
        if (!$data) {
            throw new Exception(trans('message.update_error'));
        }
        return $data;
    }

    public function deleteById($ids)
    {
        try {
            DB::beginTransaction();
            $data = $this->model->destroy($ids);
            if (!$data) {
                throw new Exception(trans('message.delete_error'));
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return $data;
    }

    public function store($input)
    {
        $data = $this->model->create($input);
        if (!$data) {
            throw new Exception(trans('message.create_error'));
        }
        return $data;
    }

    public function update($inputs, $id)
    {
        $data = $this->model->where('id', $id)->update($inputs);

        if (!$data) {
            throw new Exception(trans('message.update_error'));
        }

        return $data;
    }

     public function lists()
    {
        try {
            $data = $this->model->lists('name', 'id');
            if (!count($data)) {
                return ['error' => trans('message.listing_error')];
            }
            return $data;
        } catch (Exception $ex) {
            return ['error' => $ex->getMessage()];
        }
    }

}
