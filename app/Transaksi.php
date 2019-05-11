<?php

namespace App;
use App\user;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public function getName()
    {
        return User::where('id',$this->user)->first()->name;
    }
       public function getEmail()
    {
        return User::where('id',$this->user)->first()->email;
    }
}
