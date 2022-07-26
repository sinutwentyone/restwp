<?php 
namespace Sione\Enqueue;

require_once __SIONE_ENQUEUE_ROOT__ . '/classes/EnqueueBaseTrait.php';

if ( !class_exists('AdminCSS') ) {
    class AdminCSS {
        use EnqueueBaseTrait; 

        static function init() {    
            if ( !empty( self::$handle ) ) {
                return;
            }       

            $handle = 'sione-pseudo-css';

            Styles::register([
                'handle' => $handle,
                'src' => __SIONE_ENQUEUE_ROOT__ . '/css/pseudo-style.css'
            ]);

            self::$handle = $handle;
        }
        
        static function enqueueAll() {
            $data = self::$data;

            if ( is_array( $data ) ) {
                foreach( $data as $subdata ) {
                    wp_add_inline_style( self::$handle, $subdata );
                }
            }
        }      
    }
}