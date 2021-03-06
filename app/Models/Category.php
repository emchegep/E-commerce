<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
class Category extends Model
{
    protected $fillable = [
        'group_id',
        'name',
        'description',
        'category_img',
        'category_icon',
        'status'
    ];

    public function group(){
        return $this->belongsTo(Group::class);
    }
}
