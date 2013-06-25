<?php

/*

---------------------------------------
Welcome to Valebat
---------------------------------------

Variables below should not be changed.

The configuration file is at:

    site/config/config.php

*/

$root = dirname(__FILE__);
$rootCore = $root . DIRECTORY_SEPARATOR . 'core';
$rootSite = $root . DIRECTORY_SEPARATOR . 'site';

if( !file_exists( $rootCore . DIRECTORY_SEPARATOR . 'valebat.php' ) ) {
    die( 'The system could not be loaded' );
}

require_once( $rootCore . DIRECTORY_SEPARATOR . 'valebat.php' );