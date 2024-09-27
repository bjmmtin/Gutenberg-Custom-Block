<?php
/*
Plugin Name: CTA Modal
Description: The 'CTA Modal' plugin allows you to display a modal window when a user interacts with a button on your WordPress site. It's a simple yet effective way to engage users and provide additional content or actions without leaving the current page.
Version: 2.5
Author: Rena Thomas
Requires PHP at least: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

function faust_cta_modal_block_register_block() {
    // Automatically loads the block's JS and CSS files according to the 'block.asset.php' file
    $block_assets = include( __DIR__ . '/block.asset.php' );

    // Register the block script
    wp_register_script(
        'faust-cta-modal-block',
        plugins_url( 'block.js', __FILE__ ),
        $block_assets['dependencies'], // Dependencies from block.asset.php
        $block_assets['version']       // Version from block.asset.php
    );

    // Register the block styles (editor-specific styles)
    wp_register_style(
        'faust-cta-modal-editor-style',
        plugins_url( 'style.css', __FILE__ ),
        array(),
        $block_assets['version']
    );

    // Register the block
    register_block_type( __DIR__, array(
        'editor_script' => 'faust-cta-modal-block',  // Block editor JS
        'editor_style'  => 'faust-cta-modal-editor-style', // Block editor CSS
    ));
}

// Hook: Registers the block assets on the 'init' action
add_action( 'init', 'faust_cta_modal_block_register_block' );
