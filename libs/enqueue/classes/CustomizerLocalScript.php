<?php 
namespace Sione\Enqueue;

if ( !class_exists('CustomizerLocalScript') ) {
    class CustomizerLocalScript {
        use LocalJSTrait; 
    }
}