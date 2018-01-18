<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderModel extends Model
{
    protected $table = 'header';
    protected $appends = ['about', 'product', 'productset', 'gallery', 'blog'];

    public function getAboutAttribute(){
        if (!$this->about_img || !file_exists("images/header/{$this->about_img}") ){
            return img_holder();
        }

        return asset("images/header/{$this->about_img}");
    }

    public function getProductAttribute(){
        if (!$this->product_img || !file_exists("images/header/{$this->product_img}") ){
            return img_holder();
        }

        return asset("images/header/{$this->product_img}");
    }

    public function getProductsetAttribute(){
        if (!$this->product_set_img || !file_exists("images/header/{$this->product_set_img}") ){
            return img_holder();
        }

        return asset("images/header/{$this->product_set_img}");
    }

    public function getGalleryAttribute(){
        if (!$this->gallery_img || !file_exists("images/header/{$this->gallery_img}") ){
            return img_holder();
        }

        return asset("images/header/{$this->gallery_img}");
    }

    public function getBlogAttribute(){
        if (!$this->blog_img || !file_exists("images/header/{$this->blog_img}") ){
            return img_holder();
        }

        return asset("images/header/{$this->blog_img}");
    }
}
