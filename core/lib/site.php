<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

class Site extends object {

    function __construct() {
        $this->module = mod::get();
    }

    function load() {
        tpl::set( 'site', $this );

        mod::load( $this->module );
        tpl::load( $this->module );
    }
}