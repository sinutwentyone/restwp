<?php 
namespace Sione\Enqueue;

require_once __SIONE_ENQUEUE_ROOT__ . '/classes/EnqueueBaseTrait.php';

if ( !trait_exists('EnqueueScriptTrait') ) {
    trait EnqueueScriptTrait {
        use EnqueueBaseTrait;      
        
        static function enqueueAll() {
            $data = self::$data;

            if ( is_array( $data ) ) {
                foreach( $data as $subdata ) {
                    wp_enqueue_script( $subdata );
                }
            }
        }
    }
}