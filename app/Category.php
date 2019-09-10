<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function BlogPost(){
        return $this->hasMany('App\BlogPost');
    }
}
