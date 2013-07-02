<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

class Settings extends object {

    static function load() {
        $user = auth::user();
        $where = array(
            'owner' => $user->id()
        );
        $s = db::row( 'settings', '*', $where );
        $prefs = new Settings( $s );
        return $prefs->remove( 'owner' );
    }

}

