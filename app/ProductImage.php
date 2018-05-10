<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public function product(){
       //$ProductImage->product
    	return $this->belongsto(Product::class);

    }
    public	function getUrlAttribute()
    {
    	if(substr($this->image, 0,4)==="http"){
    		return $this->image;
    	}
    	return '/images/products/'.$this->image;
    }
}
