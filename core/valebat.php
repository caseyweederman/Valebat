<?php

// direct access protection
if( !isset( $root ) )
    die( 'Direct access is not allowed' );

// used for direct access protection
define( 'VALEBAT', true );
define( 'DS', DIRECTORY_SEPARATOR );

// include kirby toolkit
require_once( $rootCore . DS . 'toolkit' . DS . 'bootstrap.php' );

c::set( 'root',         $root );
c::set( 'root.core',    $rootCore );
c::set( 'root.site',    $rootSite );

require_once( 'load.php' );

load::autoload();

if( c::get( 'debug' ) ) {
    error_reporting( E_ALL );
    ini_set( 'display_errors', 1 );
} else {
    error_reporting( 0 );
    ini_set( 'display_errors', 0 );
}

$site = new site();
$site->load();