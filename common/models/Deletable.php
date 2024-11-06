<?php

namespace common\models;

use ReflectionClass;
class Deletable
{
    public const yes  = 1;
    public const no  = 0;


    public function getConstants()
    {
//        $reflectionClass = new ReflectionClass($this);
//        return $reflectionClass->getConstants();

        return array( self::yes=>"Да",  self::no=>"Нет");
    }


    public function getDeletableName($id)
    {
        if($id == self::yes)
            return "Да";
        if($id == self::no)
            return "Нет";

    }


}