<?php 
namespace Sione\Enqueue;

if ( !class_exists('FrontendDynamicCSS') ) {
    class FrontendDynamicCSS {
        use DynamicCSSTrait; 
    }
}