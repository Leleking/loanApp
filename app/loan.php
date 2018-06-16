<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loan extends Model
{
    protected $fillable = [
        'loan_date', 'principal', 'file','interest','years','penalty','emi_type','ad_emi','pay_mode','payment','totalinterest','total','emi','customer_id','loanType_id'
    ];
    public function customer(){
        return $this->belongsTo('App\customer');
    }
    public function test(){
        return 2;
    }
    public function loanType(){
        return $this->belongsTo('App\loanType');
    }
    public function payment(){
        return $this->belongsTo('App\payment');
    }
}
