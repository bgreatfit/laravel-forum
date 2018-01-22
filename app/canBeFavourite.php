<?php
/**
 * Created by PhpStorm.
 * User: pearlstack
 * Date: 14-Jan-18
 * Time: 4:38 PM
 */

namespace App;


trait CanBeFavourite
{

    /**
     * @param string $attribute
     */
    public function favourite($attribute = '')
    {
        if (!$this->favourites()->where(['user_id' => auth()->user()->id])->exists()
        ) {
            $this->favourites()->create(['user_id' => auth()->user()->id]);
        }
    }

    /**
     * @return mixed
     */
    public function favourites()
    {
        return $this->morphMany(Favourite::class, 'favourited');
    }

    /**
     * @return bool
     */
    public function isFavourite()
    {
        //return $this->favourites()->where('user_id', auth()->user()->id)->count();
    }

    /**
     * This Function
     *
     * @return mixed
     */
    public function getFavouriteCount()
    {
        return $this->favourites->count();
    }
}