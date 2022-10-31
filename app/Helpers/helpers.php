<?php 

if(!function_exists('setActive')){
    function setActive($route) {
        if (request()->routeIs($route)) {
           return "text-white bg-blue-500 md:bg-blue-500 md:text-white md:py-1.5 md:px-3";
        } else {
            return "text-gray-700 hover:bg-gray-500 md:hover:bg-gray-500 hover:text-white md:py-1.5 md:px-3";
        }
    }
}