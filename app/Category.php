<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $fillable = [
        'title',
        'description',
        'img_url',
    ];


    public function products (){

        return $this->belongsToMany('App\Product', "product_in_categories", "category_id", "product_id");

    }





}
