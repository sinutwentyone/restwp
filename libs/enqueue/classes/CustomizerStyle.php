<?php 
namespace Sione\Enqueue;

if ( !class_exists('CustomizerStyle') ) {
    class CustomizerStyle {
        use EnqueueBaseTrait;        
        
        static function enqueueAll() {
            $data = self::$data;

            if ( is_array( $data ) && is_customize_preview() ) {
                foreach( $data as $subdata ) {
                    wp_enqueue_style( $subdata );
                }
            }
        }
    }
}