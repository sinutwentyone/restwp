<?php 
namespace Sione\REST;

use Sione\Utilities\Utilities,
    Sione\Enqueue\Scripts,
    Sione\Enqueue\FrontendScript,
    Sione\Enqueue\FrontendLocalScript;

if ( !class_exists('Enqueue') ) {
    class Enqueue {
        public function __construct() {           
            Scripts::add([
                'handle' => 'sione-rest',
                'in_footer' => false,
                'src' => Utilities::getDirectoryURL( __SIONE_REST_ROOT__ ) . 'js/rest.js'
            ]);
            
            FrontendScript::add([ 'sione-rest' ]);

            add_action( 'wp_enqueue_scripts', [ $this, 'enqueueFrontend' ] );
        }

        public function enqueueFrontend() {
            $data = [];
            $data[ 'nonce' ] = wp_create_nonce( 'wp_rest' );
            $data[ 'baseURL' ] = esc_url_raw( get_rest_url() );

            FrontendLocalScript::add([
                'handle' => 'sione-rest',
                'prop' => 'sioneRest',
                'data' => $data
            ]);

            FrontendLocalScript::enqueueAll();
        }
    }
}