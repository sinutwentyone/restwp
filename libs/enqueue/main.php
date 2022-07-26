<?php 
namespace Sione\Enqueue;

use Sione\Utilities\Utilities;

if ( !defined( '__SIONE_ENQUEUE_ROOT__') ) {
    define( '__SIONE_ENQUEUE_ROOT__', dirname(__FILE__) );

    Utilities::loadFilesRequire( __SIONE_ENQUEUE_ROOT__ . '/classes' );
    
    Enqueue::init();
}