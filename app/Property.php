<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable=['type','owner','area','project_id','created_by','updated_by'];
}
