<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function blog_post(){

        $this->belongsToMany('App\BlogPost');
    }










    protected $fillabe = [ 'tag' ];
}
