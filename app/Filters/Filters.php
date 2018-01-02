<?php
/**
 * Created by PhpStorm.
 * User: pearlstack
 * Date: 17-Dec-17
 * Time: 6:54 AM
 */

namespace App\Filters;


use Illuminate\Http\Request;

abstract class Filters
{
    protected $filters;
    protected $request;
    protected $builder;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        $this->builder = $builder;
        foreach($this->getFilter() as $filter=>$value)
        {
            if(method_exists($this,$filter))
            {
                $this->$filter($value);
            }
        }
//        dd($this->builder);
//        if ($this->request->has('by')) {
//            return $this->by($this->request->by);
//        }
        return $this->builder;

    }

    /**
     * @param $filter
     * @return bool
     */
//    public function hasFilter($filter)
//    {
//        return method_exists($this, $filter) && $this->request->has($filter);
//    }

    /**
     * @return array
     */
    public function getFilter()
    {
        return $this->request->intersect($this->filters);
    }

}