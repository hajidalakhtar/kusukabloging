<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function poto_profile()
    {
        return User::where('id',$this->author_id)->first()->poto;
    }
      public function provider_id()
    {
        return User::where('id',$this->author_id)->first()->provider_id;
    }
        public function description()
    {
        return User::where('id',$this->author_id)->first()->description;
    }
 
    
}
