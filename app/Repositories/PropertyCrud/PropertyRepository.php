<?php
namespace App\Repositories\PropertyCrud;
use App\Property;

class PropertyRepository implements PropertyRepositoryInterface {

    private $model;
    public function __construct(Property $model)
    {
        $this->model=$model;
    }
    public function getAll()
    {
        return $this->model->all();
    }
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes,$id)
    {
        $properties=$this->model->findOrFail($id);
        $properties->update($attributes);
        return $properties;
    }
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
?>
