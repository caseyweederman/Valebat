<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

class site extends obj {

    function __construct() {
        $this->module = mod::get();
    }

    function load() {
        tpl::set( 'site', $this );

        mod::load( $this->module );
        Tpl::load( $this->module );
    }
}