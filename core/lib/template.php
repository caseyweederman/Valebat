<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

class tpl {

    static public $vars = array();

    static function set( $key, $value = false ) {
        if( is_array( $key ) ) {
            self::$vars = array_merge( self::$vars, $key );
        } else {
            self::$vars[$key] = $value;
        }
    }

    static function get( $key = null, $default = null ) {
        if( $key === null)
            return (array)self::$vars;
        return a::get( self::$vars, $key, $default );
    }

    static function load( $template, $vars = array() ) {
        $file = c::get( 'root.templates' ) . DS . $template . '.php';
        return self::loadFile( $file, $vars );
    }

    static function loadFile( $file, $vars = array() ) {
        if( !file_exists( $file ) )
            return false;
        @extract( self::$vars );
        @extract( $vars );
        content::start();
        require( $file );
        return content::flush();
    }
}