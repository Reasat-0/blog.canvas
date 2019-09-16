<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{

    public function Category(){
        return $this->belongsTo('App\Category');
    }

    public function Tags(){
        return $this->belongsToMany('App\Tag');
    }


    ####--- Dev added---###

    use SoftDeletes;
    protected $date = ['deleted_at'];

    public function getFeaturedAttribute($featured){  #it is a default method that changes the thing to a link

        return asset($featured);

    }


    protected $fillable = [

        'title','category_id','featured' , 'content','slug'
     ];
}
