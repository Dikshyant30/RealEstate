<?php
namespace App\Repositories\LocationCrud;
use App\Location;

class LocationRepository implements LocationRepositoryInterface {

    private $model;
    public function __construct(Location $model)
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
        $locations=$this->model->findOrFail($id);
        $locations->update($attributes);
        return $locations;
    }
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
?>
