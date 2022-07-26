<?php 
namespace Sione\REST;

if ( !class_exists('Route') ) {
    class Route {
        public static $namespace = '';

        public static function parseCallback( $callback = '' ) {   
            if ( is_callable( $callback ) ) {
                return $callback;
            }
        }

        public static function useNamespace( $namespace = '' ) {
            if ( is_string( $namespace ) && !empty( $namespace ) ) {
                self::$namespace = $namespace;
            }
        }

        public static function use( $namespace = '' ) {
            self::useNamespace( $namespace );
        } 

        public static function hasNamespace( $namespace = '' ) {
            return !empty( self::$namespace );
        }

        public static function get( $route = '', $callback = '' ) {
            return self::addMethod( 'GET', $route, $callback );
        }

        public static function post( $route = '', $callback = '' ) {            
            return self::addMethod( 'POST', $route, $callback );
        }

        public static function addMethod( $requestMethod = 'GET', $route = '', $callback = '' ) {
            $method = new Method([
                'namespace' => self::$namespace,
                'route' => $route,
                'method' => $requestMethod,
                'callback' => $callback
            ]);

            return $method;
        }
    }
}