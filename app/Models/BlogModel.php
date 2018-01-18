<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $appends = ['imagedir'];

    public function category(){
        return $this->hasOne('App\Models\CategoryBlogModel', 'id', 'category_id');
    }

    public function getImagedirAttribute(){
        if (!$this->image || !file_exists("images/blog/{$this->image}") ){
            return img_holder();
        }

        return asset("images/blog/{$this->image}");
    }
}
