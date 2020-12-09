<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";

    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_bill', 'id_bill_detail');
    }

    public function customer(){
    	return $this->belongsTo('App\Customer','id_customer', 'id');
    }
}
