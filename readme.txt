=== Birthday Wishes ===
Contributors: Jashan Preet Singh
Tags: birthday wishes, birthday reminder, woocommerce birth reminder
Requires at least: 6.1.1
Tested up to: 6.1.1
Requires PHP: 7.2
Stable tag: 1.0

== Description ==
This plugin adds to the user account dashboard the birthday greetings if it is the user's birthday.
In order to work properly it requires WooCommerce (at least v. 7.4.1) installed.

== Install ==
1. Upload the entire `birthday-wishes` folder to the `/wp-content/plugins` directory;
2. Activate the plugin throught the 'Plugins' menu in WordPress.

The user date of birth is currently added manually into the user metadata database table.
It needs to develop a custom field in the user profile in order to let the user add and edit it autonomously.

Just run this query in your MySql replacing the `wp_usermeta` table name with your table name and adding the proper user_id.

INSERT INTO `wp_usermeta` (`user_id`, `meta_key`, `meta_value`)
VALUES
	(1, 'date_of_birth', '1995-03-13');