<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

class mod_decks {

    private static $page = null;

    private static $user = null;

    static function run() {

        auth::firewall();

        $page = new page();

        $user = auth::user();

        $page->decks = self::loadDecks();

        global $site;

        $site->page = $page;

    }

    static function switchCard( $cardId, $origin, $dest ) {

        if( !array_key_exists( $origin, $page->decks() ) ) {
            return array(
                'status' => 'error',
                'msg'    => 'Origin deck does not exist.'
            );
        }
        if( !array_key_exists( $dest, $page->decks() ) ) {
            return array(
                'status' => 'error',
                'msg'    => 'Destination deck does not exist.'
            );
        }
    }

    static function createDeck( $name ) {

        load::loadLib( 'settings.php' );
        $settings = settings::load();

        if( array_key_exists( $name, $page->decks() ) ) {
            return array(
                'status' => 'error',
                'msg'    => 'You already have a deck named `' . $name . '`.'
            );
        }

        $deckCount = count( $page->decks() );
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
        db::insert( 'deck_names', $insert );

        return array(
            'status' => 'success',
            'msg'    => 'Created a new deck: `' . $name . '`.'
        );
    }

    static function renameDeck() {

    }

    static protected function loadDecks() {

        $select = array( 'deck', 'name' );
        $where = array( 'owner' => $user->id() );
        $deckNames = db::select( 'deck_names', $select, $where );

        $decks = array();

        foreach( $deckNames as $deck ) {
            a::set(
                $decks,
                $deck->name(),
                self::loadDeck( $deck->deck() )
            );
        }

        return $decks;
    }

    static protected function loadDeck( $deckId ) {

        $select = array( 'position', 'card' );
        $where = array( 'deck' => $deckId );
        $cards = db::select( 'decks', $select, $where );

        $deck = array();

        foreach( $cards as $card ) {
            a::set(
                $deck,
                $card->position(),
                $card->card()
            );
        }

        return $deck;
    }

}