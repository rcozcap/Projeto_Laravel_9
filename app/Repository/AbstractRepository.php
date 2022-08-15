<?php

namespace App\Repository;

abstract class AbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function store($request)
    {
        return $this->model->save($request);
    }
    
    public function update($request, $id)
    {
        return $this->model->save($request);
    }

    protected function resolveModel()
    {
        return app($this->model);
    }
}