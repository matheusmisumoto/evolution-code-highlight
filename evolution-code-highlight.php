<?php

/*
 * Plugin Name:       Highlight.js for Evolution
 * Description:       Plugin to highlight code in your posts. Uses a custom build of highlight.js.
 * Version:           1.1
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            Matheus Misumoto
 * Author URI:        https://matheusmisumoto.dev/
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'HIGHLIGHT_VERSION', '1.1' );

if ( ! function_exists( 'run_code_highlight' ) ) {
    function run_code_highlight(){
        wp_enqueue_style( 'highlight', plugin_dir_url( __FILE__ ) . 'highlightjs.css', array(), '11.9.0', 'all' );
        wp_enqueue_script( 'highlight', plugin_dir_url( __FILE__ ) . 'highlight.min.js', array(), '11.9.0');
        wp_add_inline_script('highlight', 'hljs.highlightAll();');
    }
}

add_action('wp_enqueue_scripts', 'run_code_highlight');
?>