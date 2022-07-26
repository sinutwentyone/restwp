<?php 
namespace Sione\Enqueue;

if ( !class_exists('BlockEditorDynamicCSS') ) {
    class BlockEditorDynamicCSS {
        use DynamicCSSTrait; 
    }
}