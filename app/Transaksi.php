<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    
    public function userData()
    {
        return $this->belongsTo('App\User','user');
    }

    // public function getName()
    // {
    //     return User::where('id',$this->user)->first()->name;
    // }
    //    public function getEmail()
    // {
    //     return User::where('id',$this->user)->first()->email;
    // }
}
