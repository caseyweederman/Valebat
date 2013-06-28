<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

class mod_home {

    private static $page = null;

    private static $actions = array( 'register', 'login', 'logout' );

    static function run() {

        $page = new page();

        $action = get( 'action' );

        if( empty( $action ) ) {
            $action = false;
        } else if( !v::in( $action, self::$actions ) ) {
            $action = false;
        } else {
            $action = $action;
        }

        $page->action = $action;

        if( $action ) {
            $page->return = self::$action();
        }

        global $site;

        $site->page = $page;

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