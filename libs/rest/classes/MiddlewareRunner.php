<?php
namespace Sione\REST;

if ( !class_exists( 'MiddlewareRunner' ) ) {
    class MiddlewareRunner {
        protected $currentIndex = 0;
        protected $middlewares = [];
    
        public function add( $middlewares = [] ) {
            if ( is_array( $middlewares ) ) {
                foreach( $middlewares as $middleware ) {
                    $this->middlewares[] = $middleware;
                }
            }
        }
    
        public function getClosure() {
            $next = [ $this, 'next' ];
    
            return function( $data ) use( $next ) {
                return call_user_func( $next, $data );
            };
        }
    
        public function run( $data ) {
            $this->currentIndex = 0;
            
            return $this->next( $data );
        }
    
        public function callNext() {
            $args = func_get_args();
    
            $middleware = $this->middlewares[ $this->currentIndex ];
    
            $this->currentIndex++;
    
            if ( is_callable( $middleware ) ) {
                $func = $middleware; 
            } else if ( 
                class_exists( $middleware ) 
                && method_exists( $middleware, 'handle' ) ) {
                $object = new $middleware;
    
                $func = [ $object, 'handle' ];
            } else {
                $func = [ $this, 'next' ];
            }

            return call_user_func_array( $func, $args );
        }
    
        public function hasNext() {
            $middlewaresLength = count( $this->middlewares );

            return $middlewaresLength > 0 && $this->currentIndex < $middlewaresLength;
        }
        
        public function next( $data ) {   
            if ( !( $data instanceof \WP_REST_Request ) ) {
                return $data;
            } 
         
            if ( $this->hasNext() ) {  
                $next = $this->getClosure();

                return call_user_func_array( [ $this, 'callNext' ], [ $next, $data ] );
            } 
    
            return $data;
        }
    }
}