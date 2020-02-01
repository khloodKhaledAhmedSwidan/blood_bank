<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'photo', 'category_id');

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }
    public  function getphotoAttribute($photo){
        return asset('public/'.$photo);
    }



    public function getIsFavouriteAttribute()
    {
        $client = auth('api')->user() ? auth('api')->user() : auth('site_client')->user();
        if (!$client) {
            return false;
        }
        $check = $client->posts()->where('posts.id',$this->id)->first();
        if ($check) {
            return true;
        }else {
            return false;
        }
    }

}
