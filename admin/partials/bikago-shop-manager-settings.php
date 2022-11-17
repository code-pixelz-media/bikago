<?php

/**
 * Provide a admin area settings page for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://codepixelzmedia.com.np
 * @since      1.0.0
 *
 * @package    Bikago_Shop_Manager
 * @subpackage Bikago_Shop_Manager/admin/partials
 */

$email = get_option( 'flexiroam_email');
$password = base64_decode( get_option('flexiroam_password') );

$stripe_public = get_option( 'stripe_public');
$stripe_secret = get_option( 'stripe_secret');
$rate = get_option( 'delivery_rate');
?>
<style type="text/css">
    input#stripe_public,
    input#stripe_secret {
        width: 100%;
    }
</style>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Flexiroam Settings</a></li>
    <li><a href="#tabs-2">Stripe Settings</a></li>
    <li><a href="#tabs-3">Shop Settings</a></li>
  </ul>
  <div id="tabs-1">
    
    <H1>Flexiroam Settings</H1>
    <p>Please enter flexirom username and password.</p>
    <table width="100%">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>/?post_type=bsm_product&page=bikago-settings" method="post" enctype="multipart/form-data">

    <tr>
    <td width="20%">User Email</td>
    <td width="80%"><input type="text" name="flexiroam_email" id="flexiroam-email" value="<?php echo $email; ?>" /></td>
    </tr>

    <tr>
    <td width="20%">User Password</td>
    <td width="80%"><input type="password" name="flexiroam_password" id="flexiroam-email" value="<?php echo $password; ?>" /></td>
    <!-- base64_encode and base64_decode for password security -->
    </tr>

    <tr>
    <td></td>
    <td><input type="submit" name="submit" value="Submit" /></td>
    </tr>

    </form>
    </table>

  </div>
  <div id="tabs-2">
  
    <H1>Stripe Settings</H1>
    <p>Please enter Stripe api key.</p>
    <table width="600">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>/?post_type=bsm_product&page=bikago-settings" method="post" enctype="multipart/form-data">

    <tr>
    <td width="20%">Stripe Secret Key</td>
    <td width="80%"><input type="text" name="stripe_secret" id="stripe_secret" value="<?php echo $stripe_secret; ?>" /></td>
    </tr>

    <tr>
    <td width="20%">Stripe Public Key</td>
    <td width="80%"><input type="text" name="stripe_public" id="stripe_public" value="<?php echo $stripe_public; ?>" /></td>
    </tr>

    <tr>
    <td></td>
    <td><input type="submit" name="submit" value="Submit" /></td>
    </tr>

    </form>
    </table>
  </div>
    <div id="tabs-3">
        <H1>Stripe Settings</H1>
        <p>Please enter Stripe api key.</p>
        
        <table width="600">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>/?post_type=bsm_product&page=bikago-settings" method="post" enctype="multipart/form-data">

                <tr>
                <td width="20%">Delivery Rate</td>
                <td width="40%"><input type="text" name="delivery_rate" id="delivery_rate" value="<?php echo $rate; ?>" pattern="^\d*(\.\d{0,9})?$"/></td>
                <td width="40%">Delivery Rate per KM in USD</td>
                </tr>

                <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Submit" /></td>
                </tr>

            </form>
        </table>
    </div>
</div>

<script>
jQuery( function() {
jQuery( "#tabs" ).tabs();
} );
</script>

<?php 
if ( isset($_POST["submit"]) && !empty( $_POST["flexiroam_email"] ) && !empty( $_POST["flexiroam_password"] ) ) {

$flexiroam_email = 'flexiroam_email' ;
$flexiroam_password = 'flexiroam_password' ;
$new_email = $_POST["flexiroam_email"];
$new_password = base64_encode( $_POST["flexiroam_password"] );

    if ( get_option( 'flexiroam_email' ) !== false ) {

        // The option already exists, so update it.
        update_option( 'flexiroam_email', $new_email );
        update_option( 'flexiroam_password', $new_password );

    } else {

        // The option hasn't been created yet, so add it with $autoload set to 'no'.
        $deprecated = null;
        $autoload = 'no';
        add_option( 'flexiroam_email', $new_email, $deprecated, $autoload );
        add_option( 'flexiroam_password', $new_password, $deprecated, $autoload );
    }
  
}


if ( ( isset($_POST["submit"]) && !empty( $_POST["stripe_public"] ) ) || ( isset($_POST["submit"])  && !empty( $_POST["stripe_secret"] ) ) ) {

$new_pubkey = $_POST["stripe_public"];
$new_seckey = $_POST["stripe_secret"];

    if ( get_option( 'stripe_public' ) !== false || get_option( 'stripe_secret' ) !== false ) {

        // The option already exists, so update it.
        update_option( 'stripe_public', $new_pubkey );
        update_option( 'stripe_secret', $new_seckey );

    } else {

        // The option hasn't been created yet, so add it with $autoload set to 'no'.
        $deprecated = null;
        $autoload = 'no';
        add_option( 'stripe_public', $new_pubkey, $deprecated, $autoload );
        add_option( 'stripe_secret', $new_seckey, $deprecated, $autoload );
    }
  
}


if ( isset($_POST["submit"]) && !empty( $_POST["delivery_rate"] ) ) {

$delivery_rate = $_POST["delivery_rate"];

    if ( get_option( 'delivery_rate' ) !== false ) {

        // The option already exists, so update it.
        update_option( 'delivery_rate', $delivery_rate );

    } else {

        // The option hasn't been created yet, so add it with $autoload set to 'no'.
        $deprecated = null;
        $autoload = 'no';
        add_option( 'delivery_rate', $delivery_rate, $deprecated, $autoload );
    }
  
}

