<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $fillable = [
        'title',
        'description',
        'img_url',
        'price',
        'current_count_buy',
        'summary_count',
    ];


    public function categories (){

        return $this->belongsToMany('App\Category', "product_in_categories", "id", "category_id");

    }


}
