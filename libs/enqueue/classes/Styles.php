<?php 

namespace Sione\Enqueue;

use Sione\Utilities\Utilities;

if ( !class_exists('Styles') ) {
    class Styles {
        use EnqueueBaseTrait;        
        
        static function register( $data = array() ) {
            if ( is_array( $data ) ) {
                $handle = Utilities::getArrayValue( $data, 'handle' );
                $src = Utilities::getArrayValue( $data, 'src' );
                $deps = Utilities::getArrayValue( $data, 'deps' );
                $ver = Utilities::getArrayValue( $data, 'ver' );
                $media = Utilities::getArrayValue( $data, 'media' );

                wp_register_style( $handle, $src, $deps, $ver, $media );
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