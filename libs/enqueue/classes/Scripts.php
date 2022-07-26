<?php 

namespace Sione\Enqueue;

use Sione\Utilities\Utilities;

if ( !class_exists('Scripts') ) {
    class Scripts {
        use EnqueueBaseTrait;        
        
        static function register( $data = array() ) {
            if ( is_array( $data ) ) {
                $handle = Utilities::getArrayValue( $data, 'handle' );
                $src = Utilities::getArrayValue( $data, 'src' );
                $deps = Utilities::getArrayValue( $data, 'deps' );
                $ver = Utilities::getArrayValue( $data, 'ver' );
                $in_footer = Utilities::getArrayValue( $data, 'in_footer' );

                wp_register_script( $handle, $src, $deps, $ver, $in_footer );
            }
        }

        static function registerAll() {
            $data = self::$data;

            if ( is_array( $data ) ) {
                foreach( $data as $subdata ) {
                    self::register( $subdata );
                }
            }
        }
    }
}