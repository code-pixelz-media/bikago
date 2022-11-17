<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://codepixelzmedia.com.np
 * @since      1.0.0
 *
 * @package    Bikago_Shop_Manager
 * @subpackage Bikago_Shop_Manager/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bikago_Shop_Manager
 * @subpackage Bikago_Shop_Manager/includes
 * @author     Codepixelzmedia <info@codepixelzmedia.com>
 */
class Bikago_Shop_Manager_Google {

    public function get_wpstore_ids(){

        $args = array(
            'post_type' => 'wpsl_stores',
            'posts_per_page' => -1,
            'fields' =>'ids',
        );

        //$query = new WP_Query( $args );
        $posts = get_posts( $args );

        return $posts;
    }   

    public function get_wpstore_latlng( $ids = [] )
    {
        //$ids = $this->get_wpstore_ids();
        $geocode = [];
        $count = 0;

        foreach( $ids as $id ){
            //$geocode = get_post_meta($id);

            $geocode[$count]['lat'] = floatval( get_post_meta( $id, 'wpsl_lat', true ));
            $geocode[$count]['lng'] = floatval( get_post_meta( $id, 'wpsl_lng', true ));
            $geocode[$count]['address'] = get_post_meta( $id, 'wpsl_address', true );
            $geocode[$count]['city'] = get_post_meta( $id, 'wpsl_city', true );
            $geocode[$count]['country'] = get_post_meta( $id, 'wpsl_country', true );
            

            $count++;
        }

        return $geocode;
    }

}

// $google = new Bikago_Shop_Manager_Google();
//  var_dump( $google->get_wpstore_latlng( $google->get_wpstore_ids() ) );

// var_dump( $google->get_wpstore_ids(  ) );
