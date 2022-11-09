<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function getAll()
    {
        return $this->model->all();
    }
    public function create($model)
    {
        return $this->model->create($model);
    }
    public function delete(Model $model)
    {
        return $model->delete();
    }
    public function find($id)
    {
        return $this->model->find($id);
    }
    
    public function update($id, $model )
    {
       $this->model =  $this->find($id);
       $this->model->update($model); 
       
    }
}
?>
