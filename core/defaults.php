<?php

// direct access protection
if( !defined( 'VALEBAT' ) )
    die( 'Direct access is not allowed' );

// define all directories
c::set( 'tpl.root',         c::get( 'root.site' ) . DS . 'templates' );
c::set( 'root.snippets',    c::get( 'root.site' ) . DS . 'snippets' );
c::set( 'root.config',      c::get( 'root.site' ) . DS . 'config' );
c::set( 'root.modules',     c::get( 'root.core' ) . DS . 'modules' );
c::set( 'root.lib' ,        c::get( 'root.core' ) . DS . 'lib' );