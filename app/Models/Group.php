<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name','descrip','status'];

    public function categories(){
        return $this->hasOne('App\Models\Category');
    }
}
