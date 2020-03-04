<?php
namespace App\Repositories\ProjectCrud;
use App\Project;

class ProjectRepository implements ProjectRepositoryInterface {

    private $model;
    public function __construct(Project $model)
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
        $projects=$this->model->findOrFail($id);
        $projects->update($attributes);
        return $projects;
    }
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
?>
