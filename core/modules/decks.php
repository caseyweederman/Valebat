<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

class mod_decks {

    private static $page = null;

    static function run() {

        $page = new page();

        $page->var = 'decks';

        global $site;

        $site->page = $page;

    }
}