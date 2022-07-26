<?php 

namespace Sione\Enqueue;

require_once __SIONE_ENQUEUE_ROOT__ . '/classes/DirectoryTrait.php';

if ( !trait_exists('EnqueueBaseTrait') ) {
    trait EnqueueBaseTrait {
        use DirectoryTrait;
        
        static $data = [];

        static function clear() {
            self::$data = [];
        }

        static function add( $data = [] ) {
            self::$data[] = $data;
        }

        static function collection( $data = [] ) {
            if ( is_array( $data ) && count( $data ) ) {
                foreach( $data as $subdata ) {
                    self::add( $subdata );
                }
            }
        }
    }
}