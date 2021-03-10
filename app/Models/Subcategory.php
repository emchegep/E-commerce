<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
   protected $fillable = [
       'user_id',
       'category_id',
       'name',
       'url',
       'description',
       'image',
       ''
   ];

   public function category(){
       return $this->belongsTo(Category::class);
   }
}
