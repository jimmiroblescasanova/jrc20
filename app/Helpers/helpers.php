<?php 

if(!function_exists('setActive')){
    function setActive($route) {
        if (request()->routeIs($route)) {
           return "text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:p-0";
        } else {
            return "hover:underline hover:underline-offset-1 text-gray-700 hover:bg-gray-200 md:hover:bg-transparent md:hover:text-blue-700 md:p-0";
        }
    }
}