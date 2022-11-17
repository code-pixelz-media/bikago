 <?php
    /**
     * Provide a admin area view for the plugin
     *
     * This file is used to markup the admin-facing aspects of the plugin.
     *
     * @link       https://codepixelzmedia.com
     * @since      1.0.0
     *
     * @package    Fastspring_Orders
     * @subpackage Fastspring_Orders/admin/partials
     */

     $post_id = get_the_ID();
     $price = get_post_meta($post_id, 'price', true);
     $flexiroam = get_post_meta($post_id, 'plan-flexiroam', true);
     $smartfren = get_post_meta($post_id, 'plan-smartfren', true);

?>
<div class="cpm_box" style="display: table-caption;">

	<p class="meta-options cpm_field">
		<label for="cpm_field">Price</label><br />
		<input id="price" type="text" name="price" value="<?php echo ( !empty($price)) ? $price : ""; ?>">
	</p>

   <p class="meta-options cpm_field">
      <label for="cpm_field">Flexiroam Plan</label><br />
      <input id="plan-flexiroam" type="text" name="plan-flexiroam" value="<?php echo ( !empty($flexiroam)) ? $flexiroam : ""; ?>">
   </p>

<!--    <p class="meta-options cpm_field">
      <label for="cpm_field">SmartFren Plan</label><br />
      <input id="plan-smartfren" type="text" name="plan-smartfren" value="<?php echo ( !empty($smartfren)) ? $smartfren : ""; ?>">
   </p> -->

</div>