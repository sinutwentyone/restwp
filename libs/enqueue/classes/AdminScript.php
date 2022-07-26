<?php 
namespace Sione\Enqueue;

require_once __SIONE_ENQUEUE_ROOT__ . '/classes/EnqueueScriptTrait.php';

if ( !class_exists('AdminScript') ) {
    class AdminScript {
        use EnqueueScriptTrait;        
    }
}