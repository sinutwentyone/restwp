<?php 

namespace Sione\Enqueue;

if ( !class_exists('FrontendStyle') ) {
    class FrontendStyle {
        use EnqueueStyleTrait;
    }
}