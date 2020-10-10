<?php

class CarFactory{

    public static function getCar($type){
        $type = ucfirst($type);
        $class_name = "Car$type";// getCar(44) = Car_44
        return new $class_name;
    }

}