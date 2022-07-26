<?php 
namespace Sione\Enqueue;

use Sione\Utilities\Utilities;

if ( !trait_exists('LocalJSTrait') ) {
    trait LocalJSTrait {
        use EnqueueBaseTrait; 
        
        static function enqueueAll() {
            $data = self::$data;

            if ( is_array( $data ) ) {
                foreach( $data as $subdata ) {
                    if ( is_array( $subdata ) ) {
                        $handle = Utilities::getArrayValue( $subdata, 'handle' );
                        $property = Utilities::getArrayValue( $subdata, 'prop' );
                        $obj = Utilities::getArrayValue( $subdata, 'data' );
                        
                        wp_localize_script( $handle, $property, $obj );
                    }
                }
            }
        }      
    }
}