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
      $validator = Validator::make($request->all(), [ 
        'type' => 'required|max:20',
        'owner' => 'required|max:6', 
        'area' => 'required|max:20',
        'project_id' =>'required|numeric',
        'created_by' => 'required|numeric', 
        'updated_by' => 'required|numeric', 
         ]);
    if ($validator->fails()) { 
        return response()->json(['error'=>$validator->errors()], 401);            
       }
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
      $validator = Validator::make($request->all(), [ 
        'type' => 'required|max:20',
        'owner' => 'required|max:6', 
        'area' => 'required|max:20',
        'project_id' =>'required|numeric',
        'created_by' => 'required|numeric', 
        'updated_by' => 'required|numeric', 
         ]);
    if ($validator->fails()) { 
        return response()->json(['error'=>$validator->errors()], 401);            
       }
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


