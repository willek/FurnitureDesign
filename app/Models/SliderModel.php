<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderModel extends Model
{
    protected $table = 'slider';
    protected $appends = ['imagedir'];

    public function getImagedirAttribute(){
        if (!$this->image || !file_exists("images/slider/{$this->image}")){
            return img_holder();
        }

        return asset("/images/slider/{$this->image}");
    }

    public function scopeActive($query){
        return $query->where('status', 1);
    }

}