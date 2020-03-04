<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable=['name','pin','landmark','created_by','updated_by'];
}
