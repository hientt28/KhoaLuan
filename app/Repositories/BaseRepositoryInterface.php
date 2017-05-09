<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
	public function count();

	public function all();

    public function paginate($limit);

    public function showById($id = null);

    public function create($data);

    public function updateById($inputs, $id);

    public function deleteById($ids);

    public function store($input);

    public function update($inputs, $id);

    public function lists();

}
