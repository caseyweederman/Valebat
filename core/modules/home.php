<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

class mod_home {

    private static $page = null;

    private static $actions = array( 'register', 'login', 'logout' );

    static function run() {

        self::$page = new page();

        self::$page->action = $func = getAction( self::$actions );
        if( self::$page->action() ) {
            self::$page->return = self::$func();
        }

        global $site;

        $site->page = self::$page;

    }

    static function login() {
        return auth::login( 'game' );
    }

    static function logout() {
        return auth::logout();
    }

    static function register() {
        return auth::register();
    }
}