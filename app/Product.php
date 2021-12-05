<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['quantity'];

    
    public function category()
    {
        return $this->belongsToMany('App\Category');
    }

    public function presentPrice(){
        $cash = number_format($this->price) . " LL"; 
        return $cash;
    }

    function presentTotal($tax=11){
        $cash = $this->price;
        $total = $cash + ($cash * $tax)/100;
        $presenter = number_format($total) . " LL";
        return $presenter;
    }
}
