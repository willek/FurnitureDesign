<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimonialsModel extends Model
{
    protected $table = 'testimonials';
    protected $appends = ['imagedir'];

    public function getImagedirAttribute(){
        if (!$this->image || !file_exists("images/testimonials/{$this->image}")){
            return img_holder();
        }

        return asset("/images/testimonials/{$this->image}");
    }
}
