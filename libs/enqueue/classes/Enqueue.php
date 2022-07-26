<?php
namespace Sione\Enqueue;

if ( !class_exists('Enqueue') ) {
    class Enqueue {
        use DirectoryTrait;

        static function init() {
            add_action( 'wp_enqueue_scripts', [ self::class, 'enqueue' ] );
            add_action( 'admin_enqueue_scripts', [ self::class, 'enqueueAdmin' ] );
            add_action( 'customize_controls_enqueue_scripts', [ self::class, 'enqueueCustomizeControls' ] );
            add_action( 'enqueue_block_editor_assets', [ self::class, 'enqueueBlockEditorAssets' ] );
        } 

        static function registerScriptsStyles() {
            Scripts::registerAll();
            Styles::registerAll();
        }

        static function enqueue() {
            self::registerScriptsStyles();    

            FrontendScript::enqueueAll();
            FrontendStyle::enqueueAll();            
            FrontendDynamicCSS::enqueueAll();
            FrontendLocalScript::enqueueAll();
        } 

        static function enqueueAdmin() {
            self::registerScriptsStyles();  
           
            AdminScript::enqueueAll();
            AdminStyle::enqueueAll();

            AdminDynamicCSS::enqueueAll();
            AdminLocalScript::enqueueAll();
        }

        static function enqueueCustomizeControls() {           
            self::registerScriptsStyles();  

            CustomizerScript::enqueueAll();
            CustomizerStyle::enqueueAll();

            CustomizerDynamicCSS::enqueueAll();
            CustomizerLocalScript::enqueueAll();
        }

        static function enqueueBlockEditorAssets() {        
            self::registerScriptsStyles();  

            BlockEditorScript::enqueueAll();
            BlockEditorStyle::enqueueAll();

            BlockEditorDynamicCSS::enqueueAll();
            BlockEditorLocalScript::enqueueAll();
        }
    }
}