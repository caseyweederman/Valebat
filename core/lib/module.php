<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

class Mod {

    static function get() {
        $module = get( 'module', 'home' );
        $file = c::get( 'root.modules' ) . DS . $module . '.php';
        return ( !f::exists( $file ) ) ? 'home' : $module;
    }

    static function load( $module ) {
        $file = c::get( 'root.modules' ) . DS . $module . '.php';
        require_once( $file );
        $class = 'mod_' . $module;
        $class::run();
    }

}