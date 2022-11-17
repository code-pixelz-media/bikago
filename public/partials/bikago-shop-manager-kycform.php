<?php 
  $user_token_key = ( !empty( $_GET['user_token'])) ? $_GET['user_token'] : '' ;
  $user_arr = [];

  $user_info = base64_decode( $user_token_key );

  $user_arr = explode("-",$user_info);

    if( count( $user_arr ) ){

        $customer_name =  $user_arr[0];

        $order_title = $user_arr[1] . '-' . $user_arr[2] . '-' . $user_arr[3];

        $order_post = get_page_by_title( $order_title, OBJECT, 'bsm_order');


      // sample url with token
    //https://stagingbikago.wpengine.com/kyc-form/?user_token=cmFqYW4gbGFtYS1iaWthZ28tZXNpbS0yMjQ3MTY2Mzk=s

        if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == "kyc_form" ) {
        // Do some minor form validation to make sure there is content

            $imei = ( isset ($_POST['imei']) ) ? $_POST['imei'] : '' ;

            if( !empty( $imei ) && !empty( $order_post->ID ) ){
               update_post_meta( $order_post->ID, "imei", $imei );
            }

            //INSERT OUR MEDIA ATTACHMENTS
            if (isset( $_FILES ) && !empty( $order_post->ID ) ) {
              foreach ($_FILES as $file => $array) {
                $newupload = insert_attachment($file, $order_post->ID);

                update_post_meta( $order_post->ID, "passport_url", $newupload );

              // $newupload returns the attachment id of the file that
              // was just uploaded. Do whatever you want with that now.
            }

            include BIKAGO_SHOP_MANAGER_PUBLIC . 'partials/bikago-email-template.php';
            
            $email = get_post_meta( $order_post->ID, 'email', true );

            $admin =get_option('admin_email');
            $headers = array('Content-Type: text/html; charset=UTF-8');

            $body = kycupdate_email_template( $order_post->ID );

            $subject = "KYC Update for eSim.";

            wp_mail($email, $subject, $body, $headers );

            $admin_subject = "KYC Update has been received.";

            $body_admin = "KYC Update for Esim has been received for order ID " . $order_post->ID;

            wp_mail($admin, $admin_subject, $body_admin, $headers );

        } // END THE IF STATEMENT FOR FILES

    } // END THE IF STATEMENT THAT STARTED THE WHOLE FORM
}

if( !empty( $user_token_key ) && $user_token_key != "" ){ 
?>

<!-- WINE RATING FORM -->

<div class="wpcf7">
  <form id="kyc-form" name="kyc_form" method="post" action="" class="wpcf7-form" enctype="multipart/form-data">

    <div class="form-field">
      <label>IMEI</label>
      <input type="text" name="imei" placeholder="Enter Your IMEI" required class="bsm-imei" />
    </div>

    <!-- images -->
    <div class="images">
    <label for="passport">Upload Scanned Passport</label>
    <input type="file" name="passport" id="passport" tabindex="25" />
    </div>

    <!-- post tags -->

    <fieldset class="submit">
    <input type="submit" value="Submit" tabindex="40" id="submit" name="submit" />
    </fieldset>

    <input type="hidden" name="action" value="kyc_form" />
    <input type="hidden" name="user_token" value="<?php echo ( !empty( $user_token_key ) ) ? $user_token_key : '' ; ?>" />
    
    <?php wp_nonce_field( 'new-post' ); ?>
  </form>
</div> <!-- END WPCF7 -->

<?php 
}else {
    echo '<p class="bikago-token-info">Your token key is invalid.</p>';
} ?>