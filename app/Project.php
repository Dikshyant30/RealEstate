<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=['name','duration','cost','loc_id','created_by','updated_by'];

    public function property()
    {
        return $this->hasOne(Property::class);
    }

     
    public function location()
    {
        return $this->belongsTo(Location::class,'loc_id','id');
    }
}
