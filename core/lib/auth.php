<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

s::start();

define( "PBKDF2_HASH_ALGORITHM",    "sha256" );
define( "PBKDF2_ITERATIONS",        1000 );
define( "PBKDF2_SALT_BYTE_SIZE",    24 );
define( "PBKDF2_HASH_BYTE_SIZE",    24 );

define( "HASH_SECTIONS",            4 );
define( "HASH_ALGORITHM_INDEX",     0 );
define( "HASH_ITERATION_INDEX",     1 );
define( "HASH_SALT_INDEX",          2 );
define( "HASH_PBKDF2_INDEX",        3 );

class Auth {

    static protected $user = null;

    static function login( $redirect ) {
        if( self::user() )
            go( url( $redirect ) );
        self::kill();

        $password = get( 'password' );
        $username = get( 'username' );

        if( empty( $username ) || empty( $password ) ) {
            return array(
                'status' => 'error',
                'msg'    => 'Invalid username or password.'
            );
        }

        $account = self::load( $username );

        if( !$account ) {
            return array(
                'status' => 'error',
                'msg'    => 'Invalid username or password.'
            );
        }
        if( str::lower( $account->username() ) != str::lower( $username ) ) {
            return array(
                'status' => 'error',
                'msg'    => 'Invalid username or password.'
            );
        }
        if( !self::equals( $password, $account->password() ) ) {
            return array(
                'status' => 'error',
                'msg'    => 'Invalid username or password.'
            );
        }

        $account->remove( 'password' );

        $token = str::random();
        $account->token = $token;
        cookie::set( 'authFrontend', $token, 60*60*24 );
        s::set( 'authFrontend.' . $token, $account->username() );

        go( url( $redirect ) );
    }

    static function logout( $redirect = false ) {
        self::kill();
        if( $redirect ) {
            go( url( $redirect ) );
        }
        return array(
            'status' => 'success',
            'msg'    => 'You have been logged out.'
        );
    }

    static function register() {
        $password = get( 'password' );
        $username = get( 'username' );
        $email = get( 'email' );

        if( empty( $username ) || empty( $password ) ) {
            return array(
                'status' => 'error',
                'msg'    => 'Invalid username or password.'
            );
        }
        
        if( self::load( $username ) ) {
            return array(
                'status' => 'error',
                'msg'    => 'Username already in use.'
            );
        }

        if( !v::email( $email ) ) {
            return array(
                'status' => 'error',
                'msg'    => 'Invalid email address.'
            );
        }

        $where = array( 'email' => $email );
        if( db::count( 'users', $where ) > 0 ) {
            return array(
                'status' => 'error',
                'msg'    => 'Email address already in use.'
            );
        }

        if( !v::between( $password, 8, 20 ) ) {
            return array(
                'status' => 'error',
                'msg'    => 'Passwords should be between 8 and 20 characters in length.'
            );
        }

        if( !( 
            v::match( $password, '/([a-z])+/' ) &&
            v::match( $password, '/([A-Z])+/' ) &&
            v::match( $password, '/([\d\W])+/' ) ) ) {
            return array(
                'status' => 'error',
                'msg'    => 'Passwords must contain upper and lower case letters and a digit or symbol.'
            );
        }

        $hash = self::hash( $password );

        $insert = array(
            'username'  => $username,
            'password'  => $hash,
            'email'     => $email
        );
        db::insert( 'users', $insert );

        $user = self::load( $username );

        $insert = array( 'owner' => $user->id() );
        db::insert( 'settings', $insert );
        
        return array(
            'status' => 'success',
            'msg'    => 'You have successfully registered!'
        );
    }

    static function firewall() {
        if( !self::user() )
            home();
    }

    static function user() {

        if( !is_null( self::$user ) )
            return self::$user;

        $token = cookie::get( 'authFrontend' );

        if( empty( $token ) )
            return self::$user = false;

        $username = s::get( 'authFrontend.' . $token, false );

        if( empty( $username ) )
            return self::$user = false;

        $account = self::load( $username );

        // make sure to remove the password
        // because this should never be visible to anybody
        $account->remove( 'password' );

        if( empty( $account ) || $account->username() != $username )
            return self::$user = false;

        $account->token = $token;
        return self::$user = $account;
    }

    static protected function hash( $password ) {
        // format: algorithm:iterations:salt:hash
        $salt = base64_encode( mcrypt_create_iv( PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM ) );
        return PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" .  $salt . ":" . 
            base64_encode( self::pbkdf2(
                PBKDF2_HASH_ALGORITHM,
                $password,
                $salt,
                PBKDF2_ITERATIONS,
                PBKDF2_HASH_BYTE_SIZE,
                true
            ) );
    }

    static protected function equals( $password, $hash ) {
        $params = explode(":", $hash);
        if( count( $params ) < HASH_SECTIONS )
           return false;
        $pbkdf2 = base64_decode( $params[HASH_PBKDF2_INDEX] );
        return self::slow_equals(
            $pbkdf2,
            self::pbkdf2(
                $params[HASH_ALGORITHM_INDEX],
                $password,
                $params[HASH_SALT_INDEX],
                (int) $params[HASH_ITERATION_INDEX],
                strlen( $pbkdf2 ),
                true
            )
        );
    }

    static protected function slow_equals( $a, $b ) {
        $diff = strlen( $a ) ^ strlen( $b );
        for( $i = 0; $i < strlen( $a ) && $i < strlen( $b ); $i++ ) {
            $diff |= ord( $a[$i] ) ^ ord( $b[$i] );
        }
        return $diff === 0;
    }

    static protected function pbkdf2( $algorithm, $password, $salt, $count, $key_length, $raw_output = false ) {
        $algorithm = strtolower( $algorithm );
        if( !in_array( $algorithm, hash_algos(), true ) )
            die( 'PBKDF2 ERROR: Invalid hash algorithm.' );
        if( $count <= 0 || $key_length <= 0 )
            die( 'PBKDF2 ERROR: Invalid parameters.' );
        $hash_length = strlen( hash( $algorithm, "", true ) );
        $block_count = ceil( $key_length / $hash_length );

        $output = "";
        for( $i = 1; $i <= $block_count; $i++ ) {
            $last = $salt . pack( "N", $i );
            $last = $xorsum = hash_hmac( $algorithm, $last, $password, true );
            for( $j = 1; $j < $count; $j++ ) {
                $xorsum ^= ( $last = hash_hmac( $algorithm, $last, $password, true ) );
            }
            $output .= $xorsum;
        }

        if( $raw_output )
            return substr( $output, 0, $key_length );
        else
            return bin2hex( substr( $output, 0, $key_length ) );
    }

    static protected function kill() {
        self::$user = null;
        $token = str::random();
        cookie::set( 'authFrontend', $token, 60*60*24 );
        s::restart();
    }

    static protected function load( $username ) {

        $username = str::lower( $username );

        $select = array( 'username', 'password', 'id' );
        $where = array( 'username' => $username );
        $u = db::row( 'users', $select, $where );
        if( db::affected() < 1 )
            return false;

        return new user( $u );
    }

}

class User extends object {

}