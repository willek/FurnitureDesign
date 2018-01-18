<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProductModel extends Model
{
    protected $table = 'category_product';
    protected $appends = ['imagedir'];

    public function product(){
        return $this->hasMany('App\Models\ProductModel', 'category_id', 'id');
    }

    public function getImagedirAttribute(){
        if (!$this->image || !file_exists("images/category_product/{$this->image}") ){
            return img_holder();
        }

        return asset("images/category_product/{$this->image}");
    }
}
