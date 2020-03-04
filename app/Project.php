<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=['name','duration','cost','loc_id','created_by','updated_by'];

}
