<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guarantor extends Model
{
    protected $fillable= ['name','phone','customer_id','address'];

    public function customer(){
        return $this->belongsTo('App\customer');
    }
}
