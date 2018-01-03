<?php
/**
 * Created by PhpStorm.
 * User: pearlstack
 * Date: 16-Dec-17
 * Time: 5:14 PM
 */

namespace App\Filters;


use App\User;
use Illuminate\Http\Request;

/**
 * @property  builder
 * @property Request request
 */
class ThreadFilter extends Filters
{
    protected $filters = ['by','popular'];
    protected $name  ='john';

    /**
     * @param $username
     * @param $builder
     * @return mixed
     */
    public function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();
        return $this->builder->where('user_id', $user->id);
    }
    public function popular()
    {
        $this->builder->getQuery()->orders= [];
        return $this->builder->orderBy('replies_count', 'desc');
    }


}