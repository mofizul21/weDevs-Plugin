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

require_once __DIR__ . '/vendor/autoload.php';

final class WeDevs_Academy{

    // Plugin version
    const version = '1.0';

    // class constructor
    private function __construct(){
        $this->define_constants();

        register_activation_hook( __FILE__, [$this, 'activate'] );
        add_action( 'plugins_loaded', [$this, 'init_plugin'] );
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
    
    // Define the required plugin constants
    public function define_constants(){
        define('WD_ACADEMY_VERSION', self::version);
        define('WD_ACADEMY_FILE', __FILE__);
        define('WD_ACADEMY_PATH', __DIR__);
        define('WD_ACADEMY_URL', plugins_url( '', WD_ACADEMY_FILE ));
        define('WD_ACADEMY_ASSETS', WP_ACADEMY_URL.'/assets');
    }

    // Initialze the plugin
    public function init_plugin(){
        
    }

    // Do stuff upon plugin activation
    public function activate(){
        $isntalled = get_option('wd_academy_installed' );
        if(!$isntalled){
            update_option('wd_academy_installed',  time());
        }        
        update_option( 'wd_academy_version',  WD_ACADEMY_VERSION);
    }
}

/*
* Initializes the main plugin
*/
function wedevs_academy(){
    return WeDevs_Academy::init();
}

//Kick-off the plugin
wedevs_academy();