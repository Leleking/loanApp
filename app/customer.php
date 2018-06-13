<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    public function user(){
        return $this->hasOne('App\user');
    }
    public function guarantor(){
        return $this->hasMany('App\guarantor');
    }
    public function customer_image_file(){
        return $this->hasOne('App\customer_image_file');
    }
}
