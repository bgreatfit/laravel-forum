<?php
function create($class,$attribute=[],$times)
{
    return factory($class)->create($attribute,$times);
}
function make($class,$attribute=[])
{
     return factory($class)->make($attribute,$times);

}
