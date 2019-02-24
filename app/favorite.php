<?php

namespace App;
use App\Blog;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
  public function blog()
    {
        return $this->belongsTo('App\Blog');
    }
}
