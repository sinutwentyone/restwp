<?php 

namespace Sione\Enqueue;

if ( !trait_exists('DirectoryTrait') ) {
    trait DirectoryTrait {
        static $directory = '';
        
        static function setDirectory( $dir ) {
            self::$directory = $dir;
        }
    }
}