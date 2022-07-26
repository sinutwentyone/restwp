<?php 
namespace Sione\Enqueue;

require_once __SIONE_ENQUEUE_ROOT__ . '/classes/LocalJSTrait.php';

if ( !class_exists('AdminLocalScript') ) {
    class AdminLocalScript {
        use LocalJSTrait; 
    }
}