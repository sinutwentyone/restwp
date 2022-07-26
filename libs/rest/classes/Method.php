<?php 
namespace Sione\REST;

if ( !class_exists('Method') ) {
    class Method {
        public $allowedMethods = [ 'GET', 'POST' ];
        public $method = 'GET';
        public $namespace = '';
        public $route = '';
        public $middlewares;
        public $callback;
    
        public function __construct( $props = [] ) {
            if ( is_array( $props ) ) {    
                if ( isset( $props['namespace'] ) ) {
                    $this->namespace = $props['namespace'];
                }

                if ( isset( $props['route'] ) ) {
                    $this->route = $props['route'];
                }

                if ( isset( $props['callback'] ) ) {            
                    $this->callback = $props['callback'];
                }
    
                if ( isset( $props['method'] ) ) {
                    $method = $props['method'];
    
                    $this->addMethod( $method );
                }
            }

            $this->middlewares = new MiddlewareRunner();
        
            add_action( 'rest_api_init', [ $this, 'register' ] );
        }
    
        public function addMethod( $method = '' ) {
            if ( is_string( $method ) ) {
                $method = strtoupper( $method );
    
                if ( in_array( $method, $this->allowedMethods ) ) {
                    $this->method = $method; 
                }
            }
        }
    
        public function permissionCallback() {
            return true;
        }
    
        public function middleware( $middlewares = '' ) {
            $this->middlewares->add( $middlewares );
        }
    
        public function register() {      
            $namespace = $this->namespace;
            $route = $this->route;
            $callback = Route::parseCallback( $this->callback );

            if ( is_callable( $callback ) && is_string( $namespace ) && is_string( $route ) ) {
                register_rest_route( $this->namespace, $this->route, [
                    'methods' => $this->method,
                    'permission_callback' => [ $this, 'permissionCallback' ],
                    'callback' => [ $this, 'handle' ]
                ]);
            }
        }
    
        public function handle( $request ) {
            $response = $this->middlewares->run( $request );

            if ( $response instanceof \WP_REST_Request ) {
                $callback = Route::parseCallback( $this->callback );
  
                if ( is_callable( $callback ) ) {
                    $response = call_user_func_array( $callback, [ $response ] );
                }
            } 

            return rest_ensure_response( $response );
        }
    }    
}
