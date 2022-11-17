<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://codepixelzmedia.com.np
 * @since      1.0.0
 *
 * @package    Bikago_Shop_Manager
 * @subpackage Bikago_Shop_Manager/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Bikago_Shop_Manager
 * @subpackage Bikago_Shop_Manager/public
 * @author     Codepixelzmedia <info@codepixelzmedia.com>
 */
class Bikago_Shop_Manager_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bikago_Shop_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bikago_Shop_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		//wp_enqueue_style( 'bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'intlTelInput', 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/css/intlTelInput.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bikago-shop-manager-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bikago_Shop_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bikago_Shop_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'stripe', 'https://js.stripe.com/v3/', array( 'jquery' ), $this->version, false );

		//wp_enqueue_script( 'flexiroam', plugin_dir_url( __FILE__ ) . 'js/flexiroam.js', array( 'jquery' ), $this->version, false );

		//wp_enqueue_script( 'bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'intlTelInput', 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/js/intlTelInput.js', array(  ), $this->version, false );

		wp_enqueue_script( 'markerclusterer', 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js', array(), $this->version, false );

		wp_enqueue_script( 'checkout', plugin_dir_url( __FILE__ ) . 'js/checkout.js', array( 'jquery','stripe' ), $this->version, false );
		
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bikago-shop-manager-public.js', array( 'jquery' ), $this->version, false );

		wp_localize_script( 
		        'checkout', 
		        'bsm_ajax',
		        array(
		            'url' => admin_url( 'admin-ajax.php' ),
		            'admin_url' => admin_url( ),
		            'home_url' => home_url( '/' ),  
		            'plugin_url' => BIKAGO_SHOP_MANAGER_PUBLIC_URL,   
		            'security' => wp_create_nonce( 'file_upload' ),         
		         )

		    );
		$api = BIKAGO_SHOP_MANAGER_GMAP_API; // get_option('google_api', 'options');

		$api = 'AIzaSyCFYY6fs2jtKVZuRF0OrbZcVn8NZHFgm_c';
		if( ! empty( $api )){
        	wp_enqueue_script('google-map-js', 'https://maps.googleapis.com/maps/api/js?libraries=places&key='. BIKAGO_SHOP_MANAGER_GMAP_API, array('jquery','markerclusterer'));
        }else{
        	wp_enqueue_script('google-map-js', '//maps.googleapis.com/maps/api/js', array('jquery','markerclusterer'));
        }
        //https://maps.googleapis.com/maps/api/js?key=AIzaSyCFYY6fs2jtKVZuRF0OrbZcVn8NZHFgm_c&libraries=places&callback=initAutocomplete
		wp_enqueue_script( 'gmap-custom', plugin_dir_url( __FILE__ ) . 'js/gmap-custom.js', array( 'jquery' ), $this->version, false );

		require_once( BIKAGO_SHOP_MANAGER_INCLUDE .'/class-bikago-shop-manager-google.php' );
		// $geocodes = [];
		$google = new Bikago_Shop_Manager_Google();
		$geocodes = $google->get_wpstore_latlng( $google->get_wpstore_ids() );

		//var_dump( $geocodes );
		//var_dump(  get_option('delivery_rate'));
		
		wp_localize_script( 
		        'gmap-custom', 
		        'bsm_gmap_ajax',
		        array(
		            'url' => admin_url( 'admin-ajax.php' ),  
		            'geocode' => $geocodes,
		            'rate' => get_option('delivery_rate'),
		         )

		    );

		}

	public static function display_frontend(  $atts, $content = "" ) {
		
		$attributes = shortcode_atts( array(
			'title' => 'Sim Plan 1 | 30 Days | 40GB',
			//'package' => 'sim-plan-1',
			//'price' => '',
			'location' => '',
			'tab' => '',
			'ids' => '1332,1333,1334,1335'
			//'limit' => 4,
		), $atts );
		
		ob_start();
		
		//include BIKAGO_SHOP_MANAGER_PUBLIC . 'partials/bikago-shop-manager-public-topup.php';
		
		include BIKAGO_SHOP_MANAGER_PUBLIC . 'partials/bikago-shop-manager-public-display.php';	
		
		return ob_get_clean();

		
	}

	public static function display_topup(  $atts, $content = "" ) {
				
		ob_start();
		
		include BIKAGO_SHOP_MANAGER_PUBLIC . 'partials/bikago-shop-manager-public-topup.php';
		
		return ob_get_clean();

		
	}

	public static function kyc_form_frontend(  $atts, $content = "" ) {

		ob_start();

		include BIKAGO_SHOP_MANAGER_PUBLIC . 'partials/bikago-shop-manager-kycform.php';

		return ob_get_clean();

		
	}
}


add_shortcode( 'bikago_topup', array( 'Bikago_Shop_Manager_Public', 'display_topup' ) );

add_shortcode( 'bikago_form', array( 'Bikago_Shop_Manager_Public', 'display_frontend' ) );

add_shortcode( 'bikago_kyc_form', array( 'Bikago_Shop_Manager_Public', 'kyc_form_frontend' ) );

// [bikago_form ids="1,2,3" package = 'sim-plan-1' price = "100"]

