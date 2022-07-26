<?php

namespace Sione\Utilities;

if ( !class_exists('Utilities') ) {
    class Utilities {
        static function getDirectoryURL( $directory ) {
            $backslashed = str_replace( '\\', '/', $directory );
            $dir = str_replace( $_SERVER['DOCUMENT_ROOT'], '', $backslashed );

            return get_site_url() . '/' . trailingslashit( $dir );
        }

        static function cleanEmptyArrayValue( $values = [] ) {
            $results = [];

            if ( is_array( $values ) ) {
                foreach ( $values as $prop => $value ) {
                    if ( !empty( $value ) ) {
                        $results[ $prop ] = $value; 
                    }
                }
            }   

            return $results;
        }

        static function loadFilesRequire( $directory = '' ) {
            if ( !empty( $directory ) && file_exists( $directory ) ) {
                $files = new \RecursiveIteratorIterator( new \RecursiveDirectoryIterator( $directory ) );
            
                $files->rewind();

                while ( $files->valid() ) {
                    if ( !$files->isDot() ) {
                        $file = $files->key();

                        require_once( $file );
                    }

                    $files->next();
                }
            }
        }

        static function classImplement( $class = '', $interfaceId = '' ) {
            $interfaces = class_implements( $class );

            return isset( $interfaces[ $interfaceId ] );
        }

        static function getArrayValue( $arr = array(), $key = '', $altKey = '' ) {
            $arr = self::forceArray( $arr );
            
            if ( is_array( $key ) ) {
                return;
            }

            if ( isset( $arr[ $key ] ) ) {
                return $arr[ $key ];
            } else if ( isset( $arr[ $altKey ] ) ) {
                return $arr[ $altKey ];
            }
        } 
        
        static function forceArray( $arr = array() ) {
            return is_array( $arr ) ? $arr : array();
        }

        static function isValidString( $str = '' ) {
            return is_string( $str ) && !empty( $str );
        }
    }
}