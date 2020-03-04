<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Property; 
use App\Repositories\PropertyCrud\PropertyRepositoryInterface;
use Validator;

class PropertyController extends Controller
{
    private $property;
    public function __construct(PropertyRepositoryInterface $properties)
    {
      $this->property=$properties;
    }
  
    public function createProperty(Request $request)
    {  
        $attribute = [
            'type'=>$request->input('type'),
            'owner'=> $request->input('owner'),
            'area' => $request->input('area'),
            'project_id' => $request->input('project_id'),
            'created_by'=> $request->input('created_by'),
            'updated_by' => $request->input('updated_by')
          ];
      // $attribute->save();
      print_r($attribute);
      return $this->property->create($attribute);
    }
    public function getAllProperties()
    {
      return $this->property->getAll();
    }
    public function updateById(Request $request,$id)
    {
        $attribute = [
            'type'=>$request->input('type'),
            'owner'=> $request->input('owner'),
            'area' => $request->input('area'),
            'project_id' => $request->input('project_id'),
            'created_by'=> $request->input('created_by'),
            'updated_by' => $request->input('updated_by')
          ];
      print_r($attribute);
      
      return $this->property->update($attribute,$id);
    }
    public function destroy($id)
    {
        return $this->property->delete($id); 
    }
    public function show($id)
    {
        return $this->property->show($id);
    }
  }    


