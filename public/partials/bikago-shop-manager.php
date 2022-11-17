<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://codepixelzmedia.com.np
 * @since             1.0.0
 * @package           Bikago_Shop_Manager
 *
 * @wordpress-plugin
 * Plugin Name:       Bikago Shop Manager
 * Plugin URI:        https://codepixelzmedia.com.np
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.8
 * Author:            Codepixelzmedia
 * Author URI:        https://codepixelzmedia.com.np
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bikago-shop-manager
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'bikago-shop-manager-defaults.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bikago-shop-manager-activator.php
 */
function activate_bikago_shop_manager() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-bikago-shop-manager-activator.php';
    Bikago_Shop_Manager_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bikago-shop-manager-deactivator.php
 */
function deactivate_bikago_shop_manager() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-bikago-shop-manager-deactivator.php';
    Bikago_Shop_Manager_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bikago_shop_manager' );
register_deactivation_hook( __FILE__, 'deactivate_bikago_shop_manager' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bikago-shop-manager.php';

require plugin_dir_path( __FILE__ ) . 'includes/custom-image-uplaod.php';



/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bikago_shop_manager() {

    $plugin = new Bikago_Shop_Manager();
    $plugin->run();

}
run_bikago_shop_manager();

// retrieves the attachment ID from the file URL
function bikago_get_image_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}

// THE AJAX ADD ACTIONS
add_action( 'wp_ajax_set_form', 'set_form' );    //execute when wp logged in
add_action( 'wp_ajax_nopriv_set_form', 'set_form'); //execute when logged out
function set_form(){
    $customer_name = !empty( $_POST['name'] ) ? $_POST['name'] : '' ;
    $email = !empty( $_POST['email'] ) ? $_POST['email'] : '' ;
    $plan = !empty( $_POST['plan'] ) ? $_POST['plan'] : '' ;
    $price = !empty( $_POST['price'] ) ? $_POST['price'] : '' ;
    $whatsapp = !empty( $_POST['whatsapp'] ) ? $_POST['whatsapp'] : '' ;
    $imenos = !empty( $_POST['imenos'] ) ? $_POST['imenos'] : '' ;
    $plan_id = !empty( $_POST['plan_id'] ) ? $_POST['plan_id'] : '' ;
    $sim_type = !empty( $_POST['sim_type'] ) ? $_POST['sim_type'] : '' ;
    $instant = !empty( $_POST['instant'] ) ? $_POST['instant'] : 0 ;
    $sim_data = !empty( $_POST['sim_data'] ) ? $_POST['sim_data'] : 0 ;
    $sim_company = !empty( $_POST['sim_company'] ) ? $_POST['sim_company'] : '' ;
    $deliver_option = !empty( $_POST['deliver_option'] ) ? $_POST['deliver_option'] : '' ;
    $deliver_date = !empty( $_POST['deliver_date'] ) ? $_POST['deliver_date'] : '' ;
    $flight_number = !empty( $_POST['flight_number'] ) ? $_POST['flight_number'] : '' ;
    $location = !empty( $_POST['location'] ) ? $_POST['location'] : '' ;
    $delivery_distance = !empty( $_POST['distance'] ) ? $_POST['distance'] : '' ;
    $delivery_shop = !empty( $_POST['delivery_shop'] ) ? $_POST['delivery_shop'] : '' ;

    $admin =get_option('admin_email');

    $args = array(
        'post_type' => 'bsm_order',
        'posts_per_page' => 1,
        'post_status' => array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash')    
    );

    $latest_cpt = get_posts($args);

    $rand = 1000 + absint( $latest_cpt[0]->ID ) ;
    $order_id = "bikago-esim-".$rand;
    $subject = 'Bikago Esim Receipt';
    $font_mon = "Montserrat";
    $font_bool = 'true';

    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    include (BIKAGO_SHOP_MANAGER_PUBLIC . 'partials/bikago-email-template.php');

    $body = verification_email_template_flexiroam( $order_id, $plan, $customer_name );
    
    
    wp_mail($email, $subject, $body, $headers );

    $admin_subject = "Item Sold " . $order_id;

    $body_admin = "New Order for Esim has been received with order ID " . $order_id;

    //wp_mail($admin, $admin_subject, $body_admin, $headers );

    $new_post = array(
       'post_title'    => $order_id,
       'post_status'   => 'draft',           // Choose: publish, preview, future, draft, etc.
       'post_type' => 'bsm_order',  //'post',page' or use a custom post type if you want to
       'meta_input'   => array(
            'order_id' => $order_id,
            'customer_name' => $customer_name,
            'email'         => $email,
            'plan'          => $plan,
            'price'         => $price,
            'whatsapp'      => $whatsapp,
            'imenos'        => $imenos,
            'plan_id'       => $plan_id,
            'sim_type'      => $sim_type,
            'instant'       => $instant,
            'sim_data'       => $sim_data,
            'deliver_option' => $deliver_option,
            'deliver_date'   => $deliver_date,
            'flight_number'  => $flight_number,
            'location'       => $location,
            'delivery_distance' => $delivery_distance,
            'delivery_shop'     => $delivery_shop,
            'sim_company'     => $sim_company,
        ),
    );

   // show the email in meta box
    $pid = wp_insert_post($new_post);

    die();
}

add_action( 'save_post_bsm_order', 'bikago_verification_mail', 20, 2 );
function bikago_verification_mail( $post_id, $post ) {
    // bail out if this is an autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // bail out if this is not an event item
    if ( 'bsm_order' !== $post->post_type ) {
        return;
    }

    $order_id = get_post_meta( $post_id, 'order_id', true);
    $plan = get_post_meta( $post_id, 'plan', true);
    //$image_url = get_post_meta( $post_id, 'image_url', true );
    $email = get_post_meta( $post_id, 'email', true );
    $approval = get_post_meta( $post_id, 'approval', true );

    $sim_company = get_post_meta( $post_id, 'sim_company', true );


    $subject = 'Bikago Esim Receipt';
    $font_mon = "Montserrat";
    $font_bool = 'true';
    $uid = 'qrimage';

    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    include (BIKAGO_SHOP_MANAGER_PUBLIC . 'partials/bikago-email-template.php');

    if( $sim_company == 'Flexiroam' ){
        $body = verification_email_template_flexiroam( $order_id, $plan, $approval );
    }elseif( $sim_company == 'SmartFren' ) {
        $body = verification_email_template_smartfren( $order_id, $plan, $uid, $approval );
    }else{
        $body = "Error Sim Company.";
    }

    wp_mail($email, $subject, $body, $headers );
}

if( !function_exists( 'insert_attachment' )):

function insert_attachment($file_handler,$post_id,$setthumb='false') {
    // check to make sure its a successful upload
    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');

    $attach_id = media_handle_upload( $file_handler, $post_id );

    if ($setthumb) update_post_meta($post_id,'_thumbnail_id',$attach_id);
    return $attach_id;
}

endif;

//require plugin_dir_path( __FILE__ ) . 'includes/bikago-shop-manager-curl.php';