<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function blog_posts(){

        $this->belongsToMany('App\BlogPost');
    }




    protected $fillable = [ 'tag' ];
}
