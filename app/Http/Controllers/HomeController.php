<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Property;
use App\Location;


class HomeController extends Controller
{
    public function propertyByProjectId($id)
    {
        $property=Project::find($id)->property;
        return $property; 
    }

    public function projectByPropertyId($id)
    {
        $project=Property::find($id)->project;
        return $project; 
    }

    public function locationByProjectId($id)
    {
     $location=Project::find($id)->location;
     return $location;
    }

    public function projectByLocationId($id)
    {
     $project=Location::find($id)->project;
     return $project;
    }
}
