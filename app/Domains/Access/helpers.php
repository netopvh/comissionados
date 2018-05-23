<?php

if (!function_exists("remove_bars")) {
    function remove_bars(string $attribute)
    {
        if($attribute === "[]"){
            return "";
        }else{
            $resultOne = str_replace('["','',$attribute);
            $resultTwo = str_replace('"]','',$resultOne);
            return $resultTwo;
        }
    }
}
