<?php 
namespace Sione\Enqueue;

if ( !class_exists('FrontendLocalScript') ) {
    class FrontendLocalScript {
        use LocalJSTrait; 
    }
}