<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://codepixelzmedia.com.np
 * @since      1.0.0
 *
 * @package    Bikago_Shop_Manager
 * @subpackage Bikago_Shop_Manager/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bikago_Shop_Manager
 * @subpackage Bikago_Shop_Manager/admin
 * @author     Codepixelzmedia <info@codepixelzmedia.com>
 */
class Bikago_Shop_Manager_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action( 'init', array($this, 'create_posttype' ) );
		add_action( 'init', array($this, 'create_taxonomies' ) );

		if ( is_admin() ) {
            add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
        }


		// add custom Admin column
		add_filter('manage_bsm_order_posts_columns', array( $this, 'custom_admin_column') );

		add_action( 'manage_bsm_order_posts_custom_column',  array( $this,'custom_admin_column_item'), 10, 2 );

		add_action( 'admin_menu',  array( $this, 'add_admin_menu' ) );

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, '//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css', array('thickbox'), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bikago-shop-manager-admin.css', array('thickbox'), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bikago-shop-manager-admin.js', array( 'jquery', 'jquery-ui-tabs', 'thickbox', 'media-upload' ), $this->version, false );


	}

	// Create Custom Post type for store the order data in serialzed form
	function create_posttype() {
		/** Register post type */
		register_post_type( 'bsm_qrcode',
			array(
					'labels' 		=> array(
					'name' 			=> __( 'Bikago QR Codes' ),
					'singular_name' => __( 'QR Code' ),
					'search_items'  => __( 'QR Codes', 'textdomain' ),
					'all_items'     => __( 'All QR Codes', 'textdomain' ),
					'edit_item'     => __( 'Edit QR Code', 'textdomain' ),
					'update_item'   => __( 'Update QR Code', 'textdomain' ),
					'add_new_item'  => __( 'Add QR Code', 'textdomain' ),
					'new_item_name' => __( 'New QR Code', 'textdomain' ),
				),
				'public' => true,
				'has_archive' => false,
				'rewrite' => array('slug' => 'bsm_qrcodes'),
				//'show_in_rest'=> true,
				'exclude_from_search' => true,
				'publicly_queryable' => false,
				'menu_icon' => 'dashicons-cart',
				'supports'  => array( 'title', ),
				'show_in_menu' => 'edit.php?post_type=bsm_product',
			)
		);

		register_post_type( 'bsm_order',
			array(
				'labels' => array(
					'name' => __( 'Bikago Orders' ),
					'singular_name' => __( 'bsm_order' ),
					'search_items'  => __( 'Orders', 'textdomain' ),
					'all_items'     => __( 'All Orders', 'textdomain' ),
					'edit_item'     => __( 'Edit Order', 'textdomain' ),
					'update_item'   => __( 'Update Order', 'textdomain' ),
					'add_new_item'  => __( 'Add Order', 'textdomain' ),
					'new_item_name' => __( 'New Order', 'textdomain' ),
				),
				'public' => true,
				'has_archive' => false,
				'rewrite' => array('slug' => 'bsm_order'),
				'show_in_rest'=> true,
				'exclude_from_search' => true,
				'publicly_queryable' => false,
				'menu_icon' => 'dashicons-cart',
				'supports'  => array( 'title' ),
				'show_in_menu' => 'edit.php?post_type=bsm_product',

			)
		);

		register_post_type( 'bsm_product',
			array(
					'labels' 		=> array(
					'name' 			=> __( 'Bikago Products' ),
					'singular_name' => __( 'Plan' ),
					'search_items'  => __( 'Plans', 'textdomain' ),
					'all_items'     => __( 'All Plans', 'textdomain' ),
					'edit_item'     => __( 'Edit Plan', 'textdomain' ),
					'update_item'   => __( 'Update Plan', 'textdomain' ),
					'add_new'       => __( 'Add New Plan', 'textdomain' ),
					'add_new_item'  => __( 'Add Plan', 'textdomain' ),
					'new_item_name' => __( 'New Plan', 'textdomain' ),
				),
				'public' => true,
				'has_archive' => false,
				'rewrite' => array('slug' => 'bsm_product'),
				'menu_icon' => 'dashicons-cart',
				'supports'  => array( 'title', 'editor' ),
			)
		);

	}

	function create_taxonomies() {

	}

		/**
	 * Add menu page.
	 */
	public function add_admin_menu() {
		add_submenu_page( 
			'edit.php?post_type=bsm_product', 
			__( 'Import CSV', BIKAGO_SHOP_MANAGER_TEXTDOMAIN ), 
			__( 'Import CSV', BIKAGO_SHOP_MANAGER_TEXTDOMAIN ),
			'manage_options', 
			'bikago-import-csv', 
			array( $this, 'add_import_setting_page' ) 
		);

		add_submenu_page( 
			'edit.php?post_type=bsm_product', 
			__( 'Bikago Shop Manager Setting', BIKAGO_SHOP_MANAGER_TEXTDOMAIN ), 
			__( 'Shop Setting', BIKAGO_SHOP_MANAGER_TEXTDOMAIN ),
			'manage_options', 
			'bikago-settings', 
			array( $this, 'add_setting_page' ) 
		);
	}

	/**
     * Meta box initialization.
     */
    public function init_metabox() {
        add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
        add_action( 'save_post',      array( $this, 'save_product_metabox' ), 10, 1 ); 
        add_action( 'save_post',      array( $this, 'save_order_metabox' ), 15, 1 ); 

    }


	// Display custom meta box on edit page
	/**
	 * Register meta boxes.
	 */
	public function add_metabox() {
	    add_meta_box( 'bsm-orders', __( 'Order Details', BIKAGO_SHOP_MANAGER_TEXTDOMAIN ), array( $this, 'orders_meta_callback' ), 'bsm_order', 'normal', 'high', null );
	    add_meta_box( 'bsm-customers', __( 'Customers Details', BIKAGO_SHOP_MANAGER_TEXTDOMAIN ), array( $this, 'customer_meta_callback' ), 'bsm_order', 'side', 'low', null );
		add_meta_box( 'bsm-product', __( 'Product Details', BIKAGO_SHOP_MANAGER_TEXTDOMAIN ), array( $this, 'product_meta_callback' ), 'bsm_product', 'side', 'low', null );

		add_meta_box( 'bsm-qrcode', __( 'QR Codes Details', BIKAGO_SHOP_MANAGER_TEXTDOMAIN ), array( $this, 'qrcode_meta_callback' ), 'bsm_qrcode', 'normal', 'high', null );
	}

	
	/**
	 * Callback function of add_menu_page. Displays the page's content.
	 */
	public function add_import_setting_page() {
		require BIKAGO_SHOP_MANAGER_ADMIN . 'partials/bikago-shop-manager-admin-display.php';			
	}

	/**
	 * Callback function of add_menu_page. Displays the page's content.
	 */
	public function add_setting_page() {
		require BIKAGO_SHOP_MANAGER_ADMIN . 'partials/bikago-shop-manager-settings.php';			
	}

	/**
	 * Meta box display callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	public function orders_meta_callback( $post ) {
		include BIKAGO_SHOP_MANAGER_ADMIN . 'partials/bikago-orders-register-meta-box.php';
	}

	/**
	 * Meta box display callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	public function customer_meta_callback( $post ) {
		include BIKAGO_SHOP_MANAGER_ADMIN . 'partials/bikago-customer-register-meta-box.php';
	}

	/**
	 * Meta box display callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	public function product_meta_callback( $post ) {
		include BIKAGO_SHOP_MANAGER_ADMIN . 'partials/bikago-product-register-meta-box.php';
	}

	/**
	 * Meta box display callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	public function qrcode_meta_callback( $post ) {
		include BIKAGO_SHOP_MANAGER_ADMIN . 'partials/bikago-qrcode-register-meta-box.php';
	}

	/**
	 * Save meta box content.
	 *
	 * @param int $post_id Post ID
	 */
	public function save_metabox( $post_id ) {
	    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
	        $post_id = $parent_id;
	    }
	}

	/**
	 * Save meta box content.
	 *
	 * @param int $post_id Post ID
	 */
	public function save_product_metabox( $post_id ) {
	    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
	        $post_id = $parent_id;
	    }
	    $fields = ['order_no','price','sim_company', 'sim_data', 'sim_type', 'sim_data', 'instant', 'plan', 'approval', 'deliver_option', 'deliver_date', 'flight_number', 'location', 'delivery_distance', 'delivery_shop','plan-flexiroam', 'iccid'];
	    foreach ( $fields as $field ) {
	        if ( array_key_exists( $field, $_POST ) ) {
	            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
	        }
	    }

	}

		/**
	 * Save meta box content.
	 *
	 * @param int $post_id Post ID
	 */
	public function save_qrcode_metabox( $post_id ) {
	    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
	        $post_id = $parent_id;
	    }
	    $fields = ['image_url','package_name'];
	    foreach ( $fields as $field ) {
	        if ( array_key_exists( $field, $_POST ) ) {
	            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
	        }
	    }
	}

	/**
	 * Save meta box content.
	 *
	 * @param int $post_id Post ID
	 */
	public function save_order_metabox( $post_id ) {
	    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
	        $post_id = $parent_id;
	    }
	    $fields = ['approval',];
	    foreach ( $fields as $field ) {
	        if ( array_key_exists( $field, $_POST ) ) {
	            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
	        }
	    }

	}

	public function custom_admin_column($columns){
		unset($columns['date']);
		//unset($columns['title']);
		$additional_columns = array(
			'order_id' => __('Order ID'),
			'order_created' => __('Purchase Date'),
			'product_purchased' => __('Sim Plan'),
			//'quantity' => __('Quantity'),
			'price' => __('Total'),
			'customer_name' => __('Order By'),
		);
		return array_merge($columns, $additional_columns);
	}

	public function custom_admin_column_item( $column, $post_id ) {
	  // Image column
	  if ( 'order_id' === $column ) {
	    echo get_post_meta($post_id, 'order_id', true);
	  }

	  if ( 'order_created' === $column ) {
	    echo get_the_date();
	  }

	  if ( 'product_purchased' === $column ) {
	    echo get_post_meta($post_id, 'plan', true);
	  }

	  if ( 'price' === $column ) {
	    echo get_post_meta($post_id, 'price', true);
	  }

	  if ( 'customer_name' === $column ) {
	    echo get_post_meta($post_id, 'customer_name', true);
	  }
	}

}