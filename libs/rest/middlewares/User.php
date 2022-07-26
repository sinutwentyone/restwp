<?php 
namespace Sione\REST;

if ( !class_exists('User') ) {       
    class User {
        public static function can( $capability = '' ) {
            return function( $next, $request ) use ( $capability ) {
                if ( !current_user_can( $capability ) ) {
                    return new \WP_Error( 'Unauthorized', 'You can\'t access', [ 'status' => 403 ] );
                }
                
                return $next( $request );
            };
        }
    }
}