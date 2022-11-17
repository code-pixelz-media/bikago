<?php 
  $user_token_key = ( !empty( $_GET['user_token'])) ? $_GET['user_token'] : '' ;
  $user_arr = [];

  $user_info = base64_decode( $user_token_key );

  $user_arr = explode("-",$user_info);

  $customer_name =  $user_arr[0];

  $order_title = $user_arr[1] . '-' . $user_arr[2] . '-' . $user_arr[3];

  $order_post = get_page_by_title( $order_title, OBJECT, 'bsm_order');

  //var_dump($order_post);

//https://stagingbikago.wpengine.com/kyc-form/?user_token=cmFqYW4gbGFtYS1iaWthZ28tZXNpbS0yMjQ3MTY2Mzk=s

//if( !empty( $user_token_key ) ){ 
?>

<!-- <div id="form-holder-kycform">
<form action="" class="ajax-kyc form-<?php echo $user_token_key; ?>" enctype="multipart/form-data" id="kyc-form">
    <div class="form-field">
      <label>IMEI</label>
      <input type="text" name="imei" placeholder="Enter Your IMEI" required class="bsm-imei" />
    </div>

    <div class="form-field">
      <label>Upload Passport Image</label>
      <input type="file" name="passport" placeholder="Upload Scanned Passport" required class="bsm-passport" multiple="false" aria-required="true"  accept="image/*" />
    </div>

    <input type = "submit" class="kycSubmitBtn" value="submit">

    <input type="hidden" id="kyc_user_name" class="kyc_user_name" name="kyc_user_name" value ="<?php echo $customer_name; ?>" />
    <input type="hidden" id="kyc_order" class="kyc_order" name="kyc_order" value ="<?php echo $order_title; ?>" />

    <div id="msg"></div> 
</form>
</div>
 -->

<?php
if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
  //if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == "new_post") {

// Do some minor form validation to make sure there is content
// if (isset ($_POST['title'])) {
// $title = $_POST['title'];
// } else {
// echo 'Please enter the wine name';
// }
// if (isset ($_POST['description'])) {
// $description = $_POST['description'];
// } else {
// echo 'Please enter some notes';
// }

// $tags = $_POST['post_tags'];
// $winerating = $_POST['winerating'];

// // ADD THE FORM INPUT TO $new_post ARRAY
// $new_post = array(
// 'post_title' => $title,
// 'post_content' => $description,
// 'post_category' => array($_POST['cat']), // Usable for custom taxonomies too
// 'tags_input' => array($tags),
// 'post_status' => 'publish', // Choose: publish, preview, future, draft, etc.
// 'post_type' => 'post', //'post',page' or use a custom post type if you want to
// 'winerating' => $winerating
// );

// //SAVE THE POST
// $pid = wp_insert_post($new_post);

//KEEPS OUR COMMA SEPARATED TAGS AS INDIVIDUAL
// wp_set_post_tags($pid, $_POST['post_tags']);

//REDIRECT TO THE NEW POST ON SAVE
// $link = get_permalink( $pid );
// wp_redirect( $link );

//ADD OUR CUSTOM FIELDS
//add_post_meta($pid, 'rating', $winerating, true);

//INSERT OUR MEDIA ATTACHMENTS
if ($_FILES) {
foreach ($_FILES as $file => $array) {
$newupload = insert_attachment($file,$pid);
// $newupload returns the attachment id of the file that
// was just uploaded. Do whatever you want with that now.
}

} // END THE IF STATEMENT FOR FILES

} // END THE IF STATEMENT THAT STARTED THE WHOLE FORM

//POST THE POST YO
do_action('wp_insert_post', 'wp_insert_post');

?>

<!-- WINE RATING FORM -->

<div class="wpcf7">
<form id="new_post" name="new_post" method="post" action="" class="wpcf7-form" enctype="multipart/form-data">


<!-- images -->
<fieldset class="images">
<label for="bottle_front">Front of the Bottle</label>
<input type="file" name="bottle_front" id="bottle_front" tabindex="25" />
</fieldset>

<fieldset class="images">
<label for="bottle_rear">Back of the Bottle</label>
<input type="file" name="bottle_rear" id="bottle_rear" tabindex="30" />
</fieldset>

<!-- post tags -->

<fieldset class="submit">
<input type="submit" value="Post Review" tabindex="40" id="submit" name="submit" />
</fieldset>

<input type="hidden" name="action" value="new_post" />
<?php wp_nonce_field( 'new-post' ); ?>
</form>
</div> <!-- END WPCF7 -->

<?php 
// }else {
//     echo '<p class="bikago-token-info">Your token key is invalid.</p>';
// } ?>