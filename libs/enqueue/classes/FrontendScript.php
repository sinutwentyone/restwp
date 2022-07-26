<?php 

namespace Sione\Enqueue;

if ( !class_exists('FrontendScript') ) {
    class FrontendScript {
        use EnqueueScriptTrait;        
    }
}