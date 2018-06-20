<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loanType extends Model
{
    public function loan(){
        return $this->hasMany('App\loan');
    }
}
