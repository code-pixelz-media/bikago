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
     $image_url = get_post_meta($post_id, 'image_url', true);
     $package_name = get_post_meta($post_id, 'package_name', true);

?>
<div class="cpm_box" style="display: block;">

   <p class="meta-options cpm_field">
      <label for="cpm_field">Package Name</label><br />
      <input class="cpm_input" id="package_name" type="text" name="package_name" value="<?php echo ( !empty($package_name)) ? $package_name : ""; ?>">
   </p>

   <p class="meta-options cpm_field">
      <label for="cpm_field">Image url</label><br />
      <input class="cpm_input" id="image_url" type="text" name="image_url" value="<?php echo ( !empty($image_url)) ? $image_url : ""; ?>">
   </p>

</div>

<style>
   .cpm_input{
      display: block;
      width: 100%;
   }
 </style>