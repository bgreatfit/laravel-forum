<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected  $guarded =[];
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
