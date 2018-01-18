<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigModel extends Model
{
    protected $table = 'config';
    protected $appends = ['favicondir', 'icondir', 'notfounddir', 'logindir', 'websiteimgdir'];

    public function getFavicondirAttribute(){
        if (!$this->favicon || !file_exists("images/config/{$this->favicon}") ){
            return img_holder();
        }

        return asset("images/config/{$this->favicon}");
    }

    public function getIcondirAttribute(){
        if (!$this->icon || !file_exists("images/config/{$this->icon}") ){
            return img_holder();
        }

        return asset("images/config/{$this->icon}");
    }

    public function getNotfounddirAttribute(){
        if (!$this->not_found || !file_exists("images/config/{$this->not_found}") ){
            return img_holder();
        }

        return asset("images/config/{$this->not_found}");
    }

    public function getLogindirAttribute(){
        if (!$this->login || !file_exists("images/config/{$this->login}") ){
            return img_holder();
        }

        return asset("images/config/{$this->login}");
    }

    public function getWebsiteimgdirAttribute(){
        if (!$this->website_image || !file_exists("images/config/{$this->website_image}") ){
            return img_holder();
        }

        return asset("images/config/{$this->website_image}");
    }
}
