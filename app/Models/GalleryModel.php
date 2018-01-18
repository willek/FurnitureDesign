<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
    protected $table = 'gallery';
    protected $appends = ['imagedir'];

    public function getImagedirAttribute(){
        if (!$this->image || !file_exists("images/gallery/{$this->image}")){
            return img_holder();
        }

        return asset("/images/gallery/{$this->image}");
    }
}
