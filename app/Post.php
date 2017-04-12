<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{



    protected $fillable = [

        'title',
        'body'

    ];



    public static function checkOwner($postId)
    {
        $post = self::find($postId);

        if ($post->user_id == Auth::user()->id) {
            return true;
        }
        return false;
    }


    public function user()
    {

        return $this->belongsTo('App\User');
    }





    public static function archives()
    {
        return	self::selectRaw('year(created_at) year,monthname(created_at) month,count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at)desc')
            ->get()
            ->toArray();

    }



    public function comments()
    {
        return $this->hasMany('App\Comment');
    }





}
