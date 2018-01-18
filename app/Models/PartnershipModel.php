<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnershipModel extends Model
{
    protected $table = 'partnership';
    protected $appends = ['imagedir'];

    public function getImagedirAttribute(){
        if (!$this->image || !file_exists("images/partnership/{$this->image}")){
            return img_holder();
        }

        return asset("/images/partnership/{$this->image}");
    }

    public function scopeActive($query){
        return $query->where('status', 1);
    }

}
