<?php

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BIKAGO_SHOP_MANAGER_VERSION', '1.0.8' );
define( 'BIKAGO_SHOP_MANAGER_TEXTDOMAIN', 'bikago-shop-manager' );

define( 'BIKAGO_SHOP_MANAGER_AJAX', 'bikago-shop-manager-ajax' );


define( 'BIKAGO_SHOP_MANAGER_BASE', plugin_dir_path( __FILE__ ) );
define( 'BIKAGO_SHOP_MANAGER_BASE_URL', esc_url( plugin_dir_url( __FILE__ ) ) );

define( 'BIKAGO_SHOP_MANAGER_ADMIN', BIKAGO_SHOP_MANAGER_BASE . 'admin/' );
define( 'BIKAGO_SHOP_MANAGER_ADMIN_URL', esc_url( BIKAGO_SHOP_MANAGER_BASE_URL . 'admin/' ) );

define( 'BIKAGO_SHOP_MANAGER_INCLUDE', BIKAGO_SHOP_MANAGER_BASE . 'includes/' );
define( 'BIKAGO_SHOP_MANAGER_INCLUDE_URL', esc_url( BIKAGO_SHOP_MANAGER_BASE_URL . 'includes/' ) );

define( 'BIKAGO_SHOP_MANAGER_PUBLIC', BIKAGO_SHOP_MANAGER_BASE . 'public/' );
define( 'BIKAGO_SHOP_MANAGER_PUBLIC_URL', esc_url( BIKAGO_SHOP_MANAGER_BASE_URL . 'public/' ) );

$bikago_upload_dir = wp_upload_dir();

define( 'BIKAGO_SHOP_MANAGER_UPLOAD', trailingslashit( str_replace('\\', '/', $bikago_upload_dir['basedir']) ). 'qr/' );
define( 'BIKAGO_SHOP_MANAGER_UPLOAD_URL', $bikago_upload_dir['baseurl']. 'qr/' );

define( 'BIKAGO_SHOP_MANAGER_GMAP_API', 'AIzaSyD_kFCalifPCWqt3oPCWgPhewBrD7VqO5Y' );
