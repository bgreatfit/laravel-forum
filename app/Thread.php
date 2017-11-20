<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
    protected  $guarded =[];
    public function path()
    {
       return '/threads/'.$this->id;
    }
    public function user()
    {
       return $this->belongsTo(User::class,'user_id');
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    public function creatorName()
    {
        return $this->user->name;
    }

    public function addReply($reply)
    {
        return $this->replies()->create($reply);
    }
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
