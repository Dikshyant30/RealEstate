<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Project; 
use App\Repositories\ProjectCrud\ProjectRepositoryInterface;
use Validator;

class ProjectController extends Controller
{
    private $project;
    public function __construct(ProjectRepositoryInterface $projects)
    {
      $this->project=$projects;
    }
  
    public function createProject(Request $request)
    {  
      $attribute = [
        'name'=>$request->input('name'),
        'duration'=> $request->input('duration'),
        'cost' => $request->input('cost'),
        'loc_id'=>$request->input('loc_id'),
        'created_by'=> $request->input('created_by'),
        'updated_by' => $request->input('updated_by')
      ];
      // $attribute->save();
      print_r($attribute);
      return $this->project->create($attribute);
    }
    public function getAllProjects()
    {
      return $this->project->getAll();
    }
    public function updateById(Request $request,$id)
    {
  $attribute = [
        'name'=>$request->input('name'),
        'duration'=> $request->input('duration'),
        'cost' => $request->input('cost'),
        'loc_id'=>$request->input('loc_id'),
        'created_by'=> $request->input('created_by'),
        'updated_by' => $request->input('updated_by')
    ];
      print_r($attribute);
      
      return $this->project->update($attribute,$id);
    }
    public function destroy($id)
    {
        return $this->project->delete($id); 
    }
    public function show($id)
    {
        return $this->project->show($id);
    }
  }    

