<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InboxModel extends Model
{
    protected $table = 'inbox';

    public function scopeNew($query){
        return $query->where('status', 'new');
    }
}
