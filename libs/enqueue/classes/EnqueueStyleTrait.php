<?php 
namespace Sione\Enqueue;

if ( !trait_exists('RegisterStyleTrait') ) {
    trait EnqueueStyleTrait {
        use EnqueueBaseTrait;      
        
        static function enqueueAll() {
            $data = self::$data;

            if ( is_array( $data ) ) {
                foreach( $data as $subdata ) {
                    wp_enqueue_style( $subdata );
                }
            }
        }
    }
}