<?php 
namespace Sione\REST;

if ( !class_exists('Params') ) {    
    class Params {
        public static function required( $params = [] ) {
            return function( $next, $request ) use ( $params ) {
                if ( is_array( $params ) ) {
                    foreach ( $params as $param ) {
                        if ( !$request->has_param( $param ) ) {
                            return new \WP_Error( 
                                'Invalid Param', 
                                'params: { ' . $param . ' } either invalid or not defined',
                                [ 'status' => 400 ]);
                        }
                    }
                }

                return $next( $request );
            };
        }

        public static function numeric( $params = [] ) {
            return function( $next, $request ) use ( $params ) {
                if ( is_array( $params ) ) {
                    foreach ( $params as $param ) {
                        if ( 
                            !$request->has_param( $param ) 
                            || !is_numeric( $request->get_param( $param ) ) ) {
                            return new \WP_Error( 
                                'Invalid Param', 
                                'params: { ' . $param . ' } should be numeric',
                                [ 'status' => 400 ]);
                        }
                    }
                }

                return $next( $request );
            };
        }

        public static function string( $params = [] ) {
            return function( $next, $request ) use ( $params ) {
                if ( is_array( $params ) ) {
                    foreach ( $params as $param ) {
                        if ( 
                            !$request->has_param( $param ) 
                            || !is_string( $request->get_param( $param ) ) ) {
                            return new \WP_Error( 
                                'Invalid Param', 
                                'params: { ' . $param . ' } should be string',
                                [ 'status' => 400 ]);
                        }
                    }
                }

                return $next( $request );
            };
        }
    }
}