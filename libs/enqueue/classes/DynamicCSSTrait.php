<?php 
namespace Sione\Enqueue;

use Sione\Utilities\Utilities;

if ( !trait_exists('DynamicCSSTrait') ) {
    trait DynamicCSSTrait {
        use EnqueueBaseTrait; 
        
        static function enqueueAll() {
            $data = self::$data;

            if ( is_array( $data ) ) {
                foreach( $data as $subdata ) {
                    $handle = Utilities::getArrayValue( $subdata, 'handle' );
                    $css = Utilities::getArrayValue( $subdata, 'data');

                    wp_add_inline_style( $handle, $css );
                }
            }
        }      
    }
}