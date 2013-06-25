<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

class load {

    static function autoload() {
        $core = c::get( 'root.core' );
        self::loadFile( $core . DS . 'defaults.php' );

        $conf = c::get( 'root.config' );
        self::loadFile( $conf . DS . 'config.php' );

        self::loadLib( 'helpers.php' );
        self::loadLib( 'module.php' );
        self::loadLib( 'obj.php' );
        self::loadLib( 'site.php' );
        self::loadLib( 'page.php' );
    }

    static function loadLib( $name ) {
        $name = c::get( 'root.lib' ) . DS . $name;
        if( !file_exists( $name ) )
            return false;
        require_once( $name );
    }

    static function loadFile( $file ) {
        if( !file_exists( $file ) )
            return false;
        require_once( $file );
    }
}