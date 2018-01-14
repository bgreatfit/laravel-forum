<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use canBeFavourite;
    //
    protected  $guarded =[];
    protected  $with = ['user','favourites'];
//    protected  $withCount = ['favourites'];
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function creatorName()
    {
        return $this->user->name;
    }


}
