<?php 
namespace Sione\Enqueue;

if ( !class_exists('LocalScript') ) {
    class LocalScript {
        use LocalJSTrait; 
        
        static $handle = '';

        static function init( $directoryURI = '' ) {       
            if ( !empty( self::$handle ) || !file_exists( $directoryURI ) ) {
                return;
            }       

            $handle = 'sione-pseudo-script';

            Scripts::register([
                'handle' => $handle,
                'src' => $directoryURI . '/js/pseudo-script.js'
            ]);

            self::$handle = $handle;
        }    
    }
}