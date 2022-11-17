<?php 
    if(isset($_GET['post'])){
        $post_id = $_GET['post'];
        $customer_name = get_post_meta($post_id, 'customer_name', true);
        $email = get_post_meta($post_id, 'email', true);
        $passport_id = get_post_meta($post_id, 'passport_url', true);
        $imei = get_post_meta($post_id, 'imei', true);
        $whatsapp = get_post_meta($post_id, 'whatsapp', true);
    } 
?>
<p class="meta-options cpm_field">
	<label for="cpm_field">Name</label><br />
	<input id="name" type="text" name="name" value="<?php echo ( !empty($customer_name)) ? $customer_name : ""; ?>">
</p>

<p class="meta-options cpm_field">
	<label for="cpm_field">Email</label><br />
	<input id="email" type="email" name="email" value="<?php echo ( !empty($email)) ? $email : ""; ?>">
</p>

<p class="meta-options cpm_field">

    <?php $passport_url = wp_get_attachment_url( $passport_id );?>

      <label for="cpm_field">Passport</label><br />
      <img src="<?php echo esc_url( $passport_url ); ?>" style="width: 100%;" />
      <!-- <input class="cpm_input" id="passport_url" type="text" name="passport_url" value="<?php echo ( !empty($passport_url)) ? $passport_url : ""; ?>"> -->
      <a href="<?php echo ( !empty($passport_url)) ? $passport_url : ""; ?>" style="display:block" target="_blank">View Passport Image</a>
</p>

<p class="meta-options cpm_field">
	<label for="cpm_field">IMEI</label><br />
	<input id="imei" type="text" name="imei" value="<?php echo ( !empty($imei)) ? $imei : ""; ?>">
</p>


<p class="meta-options cpm_field">
	<label for="cpm_field">Whatsapp</label><br />
	<input id="whatsapp" type="text" name="whatsapp" value="<?php echo ( !empty($whatsapp)) ? $whatsapp : ""; ?>">
</p>
