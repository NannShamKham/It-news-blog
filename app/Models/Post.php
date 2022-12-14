<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $with = ['category','user','photos'];

    public function settitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public  function photos(){
        return $this->hasMany(Photo::class);
    }
    public function  scopeSearch($query){
     return  $query -> when(request('keyword'),function($q){
            $keyword = request('keyword');
            $q->orWhere("title","like","%$keyword%")
                ->orWhere("description","like","%$keyword%");
        });
    }
}
