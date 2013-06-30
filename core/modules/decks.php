<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

class mod_decks {

    private static $page = null;

    static function run() {

        auth::firewall();

        $page = new page();

        $user = auth::user();

        $where = array( 'owner' => $user->id() );
        $decks = db::select( 'decks', '*', $where );
        $decks = a::remove( $decks, 'owner' );

        global $site;

        $site->page = $page;

    }

}