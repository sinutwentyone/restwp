<?php
namespace Sione\REST;

use Sione\Utilities\Utilities,
    Sione\Enqueue\Scripts,
    Sione\Enqueue\FrontendScript,
    Sione\Enqueue\FrontendLocalScript;

if ( !defined( '__SIONE_REST_ROOT__') ) {
    define( '__SIONE_REST_ROOT__', dirname(__FILE__) );

    Utilities::loadFilesRequire( __SIONE_REST_ROOT__ . '/classes' );
    Utilities::loadFilesRequire( __SIONE_REST_ROOT__ . '/middlewares' );

    new Enqueue();
}