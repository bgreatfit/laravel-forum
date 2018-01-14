<?php
/**
 * Created by PhpStorm.
 * User: pearlstack
 * Date: 14-Jan-18
 * Time: 4:38 PM
 */

namespace App;


trait canBeFavourite
{

    public function favourite($attribute = '')
    {
        if (!$this->favourites()->where(['user_id' => auth()->user()->id])->exists()) {
            $this->favourites()->create(['user_id' => auth()->user()->id]);
        }
    }

    public function favourites()
    {
        return $this->morphMany(Favourite::class, 'favourited');
    }

    public function isFavourite()
    {
        return !!$this->favourites->where('user_id', auth()->user()->id)->count();
    }

    public function getFavouriteCount()
    {
        return $this->favourites->count();
    }
}