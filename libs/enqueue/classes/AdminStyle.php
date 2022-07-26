<?php 
namespace Sione\Enqueue;

require_once __SIONE_ENQUEUE_ROOT__ . '/classes/EnqueueStyleTrait.php';

if ( !class_exists('AdminStyle') ) {
    class AdminStyle {
        use EnqueueStyleTrait;   
    }
}