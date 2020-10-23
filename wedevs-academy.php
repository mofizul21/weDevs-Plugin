<?php

/*
Plugin Name: weDevs Academy
Description: A tutorial plugin for weDevs Academy
Plugin URI: https://tareq.com
Author: Tareq Hasan
Author URI: https://tareq.com
Version: 1.0
*/

if(!defined('ABSPATH')){
    exit;
}

final class weDevs_Academy{
    private function __construct()
    {
        
    }

    /*
    * Initialized a singleton instance
    */
    public static function init(){
        static $instance = false;

        if (! $instance) {
            $instance = new self();
        }

        return $instance;
    }    
}

/*
* Initialize the main plugin
*/
function wedevs_academy(){
    return weDevs_Academy::init();
}

//Kick-off the plugin
wedevs_academy();