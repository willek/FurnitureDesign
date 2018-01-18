<?php

if (!function_exists('random_name')) {
    function random_name($string) {
        $char = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $string = str_limit(str_slug($string), 5);
        $string = str_shuffle($char.$string);
        return $string;
    }
}

if (!function_exists('cleanupentries')) {
    function cleanupentries($entry) {
        $entry = htmlspecialchars(stripslashes(trim($entry)));
        return $entry;
    }
}

if (!function_exists('read_more')) {
    function read_more($string,$limit=100){
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = trim(preg_replace('/\t+/', '', $string));
        $string = str_replace('&nbsp;','',$string);
        $length = strlen(strip_tags($string));
        if ($length>$limit){
            return substr(strip_tags($string),0,$limit).' . . . ';
        }
        else {
            return strip_tags($string);
        }
    }
}

if (!function_exists('upload_image')){
    function upload_image($image, $name, $dir){
        $data['image'] = $image;
        $data['name'] = $name;
        $data['dir'] = public_path($dir);
        $data['image']->move($data['dir'], $data['name']);
        return $data;
    }
}

if (!function_exists('img_holder')){
    function img_holder($type=null){
        switch ($type){
            case 'avatar':
                return asset('/images/placeholder/avatar.png');
                break;
            default:
                return asset('/images/placeholder/basic.png');
                break;
        }
    }
}

if (!function_exists('remFile')){
    function remFile($path){
        if(unlink($path)){
            return true;
        }
        return false;
    }
}

if (!function_exists('custom_date')){
    function custom_date($date){
        $address = substr($date,8,2);
        switch (substr($date,5,2)){
            case '01':
                $month= "January";
                break;
            case '02':
                $month= "February";
                break;
            case '03':
                $month= "March";
                break;
            case '04':
                $month= "April";
                break;
            case '05':
                $month= "May";
                break;
            case '06':
                $month= "June";
                break;
            case '07':
                $month= "July";
                break;
            case '08':
                $month= "August";
                break;
            case '09':
                $month= "September";
                break;
            case '10':
                $month= "October";
                break;
            case '11':
                $month= "November";
                break;
            case '12':
                $month= "December";
                break;
        }

        $year = substr($date,0,4);
        return $address.' '.$month.' '.$year;
    }
}