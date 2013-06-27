<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

class mod_login {

    private static $page = null;

    private static $actions = array( 'register', 'login' );

    static function run() {

        $page = new page();

        $action = get( 'action' );

        if( empty( $action ) ) {
            $action = false;
        } else if( !v::in( $action, $actions ) ) {
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

    static function register() {
        return auth::register();
    }
}