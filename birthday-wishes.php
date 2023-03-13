<?php
/*
Plugin Name: Birthday Wishes
Description: This plugin adds to the user account dashboard the birthday greetings if it is the user's birthday. Required Woocommerce.
Version: 1.0
Author: Jashan Preet Singh
Author URI: https://jashansingh.com
*/

/**
 * Load the plugin classes.
 */
require_once __DIR__ . '/classes/BirthdayWishes_User.php';

/**
 * Load the plugin stylesheet.
 */
add_action('wp_enqueue_scripts', 'enqueue_stylesheet');

function enqueue_stylesheet()
{
    wp_enqueue_style('birthday-wishes-stylesheet', plugins_url('/assets/css/style.css', __FILE__), false, '1.0.0', 'all');
}