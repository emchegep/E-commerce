<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'subcategory_id',
        'name',
        'url',
        'small_description',
        'image',
        'p_highlight_heading',
        'p_highlights',
        'p_description_heading',
        'p_description',
        'p_dettails_heading',
        'p_details',
        'sale_tag',
        'original_price',
        'offer_price',
        'quantity',
        'priority',
        'new_arrival_products',
        'featured_products',
        'popular_products',
        'offers_products',
        'status',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
}
