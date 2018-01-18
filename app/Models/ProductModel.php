<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $appends = ['imagedir'];

    public function category(){
        return $this->hasOne('App\Models\CategoryProductModel', 'id', 'category_id');
    }

    public function getImagedirAttribute(){
        if (!$this->image || !file_exists("images/product/single/{$this->image}")){
            return img_holder();
        }

        return asset("/images/product/single/{$this->image}");
    }
}
