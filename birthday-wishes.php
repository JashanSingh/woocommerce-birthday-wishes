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

/**
 * Handle the birthday wishes in the WooCommerce user account dashboard.
 * 
 * This function is hooked to specific WooCommerce hook. In case, WooCommerce is not installed this can't be executed.
 */
add_filter('woocommerce_account_dashboard', 'add_birthday_wishes_text');

function add_birthday_wishes_text()
{
    // Get all the users meta in one shoot.
    $usermeta = get_user_meta(get_current_user_id());

    // Instantiate the user class.
    $user = new BirthdayWishes_User($usermeta);

    // Print the birthday wishes.
    if ($user->IsBirthday()) {
        echo '<div class="birthday-wishes-box">Auguri <strong>'. $user->getFullName() .'</strong> per i tuoi <strong>'. $user->getAge() .'</strong> anni!</div>';
    }
}