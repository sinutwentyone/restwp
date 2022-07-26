<?php 
namespace Sione\Enqueue;

if ( !class_exists('CustomizerDynamicCSS') ) {
    class CustomizerDynamicCSS {
        use DynamicCSSTrait; 
    }
}