<?php

/**
 * 
 */

 namespace AQUILIA_THEME\Inc\Traits;

 trait Singleton{
    protected function __construct(){

    }

    /**
     * Prevent object cloning
     */
    final protected function __clone(){

    }

    final public static function get_instance(){

        static $instance =[];
        $called_class = get_called_class();
    
        if( !isset( $instance[$called_class])){
            $instance[ $called_class ] = new $called_class; 

            do_action('aquilia_theme_singleton_init%s', $called_class);
        }
        return $instance[ $called_class ];
    }

    
 }