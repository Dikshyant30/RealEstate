<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Location; 
use App\Repositories\LocationCrud\LocationRepositoryInterface;
use Validator;

class LocationController extends Controller
{
    private $location;
    public function __construct(LocationRepositoryInterface $locations)
    {
      $this->location=$locations;
    }
  
    public function createLocation(Request $request)
    {  
        $attribute = [
            'name'=>$request->input('name'),
            'pin'=> $request->input('pin'),
            'landmark' => $request->input('landmark'),
            'created_by'=> $request->input('created_by'),
            'updated_by' => $request->input('updated_by')
          ];
      // $attribute->save();
      print_r($attribute);
      return $this->location->create($attribute);
    }
    public function getAllLocation()
    {
      return $this->location->getAll();
    }
    public function updateById(Request $request,$id)
    {
        $attribute = [
            'name'=>$request->input('name'),
            'pin'=> $request->input('pin'),
            'landmark' => $request->input('landmark'),
            'created_by'=> $request->input('created_by'),
            'updated_by' => $request->input('updated_by')
          ];
      print_r($attribute);
      
      return $this->location->update($attribute,$id);
    }
    public function destroy($id)
    {
        return $this->location->delete($id); 
    }
    public function show($id)
    {
        return $this->location->show($id);
    }
  }    


