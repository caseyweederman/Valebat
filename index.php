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
$rootCore = $root . '/core';
$rootSite = $root . '/site';

if( !file_exists( $rootCore . '/valebat.php' ) ) {
	die( 'The system could not be loaded' );
}

require_once( $rootCore . '/valebat.php' );