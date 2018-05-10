<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products(){
    	//$categoy->products
    	return $this->hasMany(Product::class);

    }
}
