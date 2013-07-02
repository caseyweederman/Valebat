<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

class mod_decks {

    private static $page = null;

    private static $names = array();
    private static $user = null;

    static function run() {

        auth::firewall();

        $page = new page();

        $user = auth::user();

        $where = array( 'owner' => $user->id() );

        $decks = db::select( 'decks', '*', $where );

        foreach( $decks as $deck ) {
            $names[] = $n = $deck->name();
            $page->decks->$$n = $deck->remove( 'owner' );
        }

        $select = array( 'card', 'quantity' );
        $inventory = db::select( 'inventories', $select, $where );

        global $site;

        $site->page = $page;

    }

    static function switchCard( $cardId, $origin, $dest ) {

        if( !v::in( $origin, $names ) ) {
            return array(
                'status' => 'error',
                'msg'    => 'Origin deck does not exist.'
            );
        }
        if( !v::in( $dest, $names ) ) {
            return array(
                'status' => 'error',
                'msg'    => 'Destination deck does not exist.'
            );
        }
    }

    static function createDeck( $name ) {

        load::loadLib( 'settings.php' );
        $settings = settings::load();

        if( v::same( $name, 'inv' ) ) {
            return array(
                'status' => 'error',
                'msg'    => 'Decks cannot be named `inv`.'
            );
        }
        if( v::in( $name, $names ) ) {
            return array(
                'status' => 'error',
                'msg'    => 'You already have a deck named `' . $name . '`.'
            );
        }

        $deckCount = count( $page->decks->toArray() );
        if( $deckCount >= $settings->decks() ) {
            return array(
                'status' => 'error',
                'msg'    => 'You can make a maximum of ' . $settings->decks() . ' decks.'
            );
        }

        $insert = array(
            'owner' => $user->id(),
            'name' => $name
        );
        db::insert( 'decks', $insert );

        return array(
            'status' => 'success',
            'msg'    => 'Created a new deck: `' . $name . '`.'
        );
    }

    static function renameDeck() {

    }

}