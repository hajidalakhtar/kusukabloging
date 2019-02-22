<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
  public function poto_profile()
    {
        return User::where('id',$this->author_id)->first()->poto;
    }
}
