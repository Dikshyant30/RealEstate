<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;
class Location extends Model
{
    protected $fillable=['name','pin','landmark','created_by','updated_by'];

    public function project()
    {
        return $this->hasMany(Project::class,'loc_id');
    }
}
