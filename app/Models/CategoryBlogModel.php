<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryBlogModel extends Model
{
    protected $table = 'category_blog';

    public function blog(){
        return $this->hasMany('App\Models\BlogModel', 'category_id', 'id');
    }
}
