<?php 
namespace Sione\Enqueue;

require_once __SIONE_ENQUEUE_ROOT__ . '/classes/DynamicCSSTrait.php';

if ( !class_exists('AdminDynamicCSS') ) {
    class AdminDynamicCSS {
        use DynamicCSSTrait; 
    }
}