<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

function url( $uri = false ) {
    $baseUrl = c::get( 'url' );
    if( $uri && is_file( c::get( 'root' ) . '/' . $uri ) ) {
        return $baseUrl . '/' . $uri;
    }
    return $baseUrl . '/' . ltrim( $uri, '/' );
}

function home() {
    go( url() );
}

function getAction( $allowed ) {
    $action = get( 'action' );
    if( empty( $action ) || !v::in( $action, $allowed ) ) {
        return false;
    }
    return $action;
}

function snippet( $snippet, $data = array() ) {
    return tpl::loadFile( c::get( 'root.snippets' ) . DS . $snippet . '.php', $data );
}

function css( $url, $media = false ) {
    $url = ( str::match( $url, '~(^\/\/|^https?:\/\/)~' ) ) ? $url : url( ltrim( $url, '/' ) );
    if( !empty( $media ) ) {
        return '<link rel="stylesheet" media="' . $media . '" href="' . $url . '" />' . "\n";
    } else {
        return '<link rel="stylesheet" href="' . $url . '" />' . "\n";
    }
}

function js( $url, $async = false ) {
    $url   = ( str::match( $url, '~(^\/\/|^https?:\/\/)~' ) ) ? $url : url( ltrim( $url, '/' ) );
    $async = ( $async ) ? ' async' : '';
    return '<script' . $async . ' src="' . $url . '"></script>' . "\n";
}