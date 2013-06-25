<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

class mod_home {

    private static $page = null;

    static function run() {

        $page = new page();

        $page->var = 'Hello';

        global $site;

        $site->page = $page;

    }
}