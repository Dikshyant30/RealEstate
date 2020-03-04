<?php
namespace App\Repositories\ProjectCrud;

interface ProjectRepositoryInterface
{
    public function getAll();

    public function show($id);

    public function create(array $attributes);

    public function update(array $attributes, $id);
 
    public function delete($id);
}

?>
