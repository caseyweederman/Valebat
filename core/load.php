<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

class Load {

    static function autoload() {
        $core = c::get( 'root.core' );
        self::loadFile( $core . DS . 'defaults.php' );

        $conf = c::get( 'root.config' );
        self::loadFile( $conf . DS . 'config.php' );

        self::loadLib( 'helpers.php' );
        self::loadLib( 'module.php' );
        self::loadLib( 'site.php' );
        self::loadLib( 'page.php' );
        self::loadLib( 'auth.php' );
    }

    static function loadLib( $name ) {
        $file = c::get( 'root.lib' ) . DS . $name;
        self::loadFile( $file );
    }

    static function loadFile( $file ) {
        f::load( $file );
    }
}