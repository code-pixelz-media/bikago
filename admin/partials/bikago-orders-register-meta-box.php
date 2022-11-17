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

    if(isset($_GET['post'])){
        $post_id = $_GET['post'];
        $order_id = get_post_meta($post_id, 'order_id', true);
        $price = get_post_meta($post_id, 'price', true);
        $plan = get_post_meta($post_id, 'plan', true); 
        $approval = get_post_meta($post_id, 'approval', true); 
        $plan_id = get_post_meta($post_id, 'plan_id', true); 
        $sim_type = get_post_meta($post_id, 'sim_type', true); 
        $instant = get_post_meta($post_id, 'instant', true); 
        $sim_data = get_post_meta($post_id, 'sim_data', true); 
        $sim_company = get_post_meta($post_id, 'sim_company', true); 
        $quantity = get_post_meta($post_id, 'quantity', true);
        $deliver_option = get_post_meta($post_id, 'deliver_option', true);
        $deliver_date = get_post_meta($post_id, 'deliver_date', true);
        $flight_number = get_post_meta($post_id, 'flight_number', true);
        $location = get_post_meta($post_id, 'location', true);
        $delivery_distance = get_post_meta($post_id, 'delivery_distance', true);
        $delivery_shop = get_post_meta($post_id, 'delivery_shop', true);
        $qr_code = get_post_meta($post_id, 'qr_code', true);

        $sku = get_post_meta( $post_id, 'sku', true );
        $product_code = get_post_meta( $post_id, 'product_code', true );
        $iccid = get_post_meta( $post_id, 'iccid', true );
        $order_no = get_post_meta( $post_id, 'order_no', true );

        if(  $approval == 'verified'  ){
            $check_approval = 'verified';
        }else if( $approval == 'rejected' ){
            $check_approval = 'rejected';
        }else{
            $check_approval = 'not-verified';
        }

        $order_id = get_post_meta( $post_id, 'order_id', true);
        $plan = get_post_meta( $post_id, 'plan', true);
        $plan_code = get_post_meta( $post_id, 'plan_code', true);
        //$image_url = get_post_meta( $post_id, 'image_url', true );
        $email = get_post_meta( $post_id, 'email', true );
        $approval = get_post_meta( $post_id, 'approval', true );

        $sim_company = get_post_meta( $post_id, 'sim_company', true );
        
    }   
?>
<div class="cpm_box" style="display: flex;flex-wrap: wrap;">
<!--     
    <p class="meta-options cpm_field">
        <label for="cpm_field">Approval Request</label>
        <select id="approval" name="approval">
            <option value="verified" <?php selected( $check_approval, 'verified' ); ?>>Verified</option>
            <option value="not-verified" <?php selected( $check_approval, 'not-verified' ); ?>>Need Verification</option>
            <option value="rejected" <?php selected( $check_approval, 'rejected' ); ?>>Rejected</option>
        </select>
    </p> -->
<!-- currently working on flexiroam only so i have removed this option -->
<!--     <p class="meta-options cpm_field">
        <label for="cpm_field">SIM Company</label>
        <select id="sim_company" name="sim_company">
             <option value="Flexiroam" <?php selected( $sim_company, 'Flexiroam' ); ?>>Flexiroam</option>
            <option value="SmartFren" <?php selected( $sim_company, 'SmartFren' ); ?>>SmartFren</option>
           
        </select>
    </p> -->

<!--     <p class="meta-options cpm_field">
        <label for="cpm_field">Order Id</label>
        <input id="order_id" type="text" name="order_id" value="<?php echo ( !empty($order_id)) ? $order_id : ""; ?>" disabled>
    </p> -->

    <p class="meta-options cpm_field">
        <label for="cpm_field">Order Id In Flexiroam</label>
        <input id="order_no" type="text" name="order_no" value="<?php echo ( !empty($order_no)) ? $order_no : ""; ?>" >
    </p>


    <p class="meta-options cpm_field">
        <label for="cpm_field">Sim Iccid</label>
        <input id="iccid" type="text" name="iccid" value="<?php echo ( !empty($iccid)) ? $iccid : ""; ?>" >
    </p>

    <p class="meta-options cpm_field">
        <label for="cpm_field">Sim Sku</label>
        <input id="sku" type="text" name="sku" value="<?php echo ( !empty($sku)) ? $sku : ""; ?>" >
    </p>

    <p class="meta-options cpm_field">
        <label for="cpm_field">Sim Product Code</label>
        <input id="product_code" type="text" name="product_code" value="<?php echo ( !empty($product_code)) ? $product_code : ""; ?>" >
    </p>

    

<!--     <p class="meta-options cpm_field">
        <label for="cpm_field">Quantity</label>
        <input id="quantity" type="number" name="quantity" value="<?php echo ( !empty($quantity)) ? $quantity : ""; ?>" >
    </p> -->

    <p class="meta-options cpm_field">
        <label for="cpm_field">Total Amount</label>
        <input id="price" type="text" name="price" value="<?php echo ( !empty($price)) ? $price : ""; ?>">
    </p>

    <p class="meta-options cpm_field">
        <label for="cpm_field">Plan Purchased</label>
        <input id="plan" type="text" name="plan" value="<?php echo ( !empty($plan)) ? $plan : ""; ?>" >
    </p>

    <p class="meta-options cpm_field">
        <label for="cpm_field">Plan Purchased Code</label>
        <input id="plan_code" type="text" name="plan_code" value="<?php echo ( !empty($plan_code)) ? $plan_code : ""; ?>" >
    </p>

    <p class="meta-options cpm_field">
        <label for="cpm_field">SIM Type</label>
        <input id="sim_type" type="text" name="sim_type" value="<?php echo ( !empty($sim_type)) ? $sim_type : ""; ?>" >
    </p>

    <p class="meta-options cpm_field">
        <label for="cpm_field">Sim Qr Code</label>
        <input id="qr_code" type="text" name="qr_code" value="<?php echo ( !empty($qr_code)) ? $qr_code : ""; ?>" >
    </p>

    <p class="meta-options cpm_field"></p>
    <p class="meta-options cpm_field"></p>
    <p class="meta-options cpm_field"></p>



<!--     <p class="meta-options cpm_field">
        <label for="cpm_field">Quantity</label>
        <input id="quantity" type="number" name="quantity" value="<?php echo ( !empty($quantity)) ? $quantity : 1; ?>">
    </p> -->

</div>

<strong>Delivery Info</strong>
<div class="cpm_box_delivery" style="display: flex;flex-wrap: wrap;">

    
    <p class="meta-options cpm_field">
        <label for="cpm_field">Delivery Type</label>
        <input id="deliver_option" type="text" name="deliver_option" value="<?php echo ( !empty($deliver_option)) ? $deliver_option : ""; ?>" >
    </p>

    <p class="meta-options cpm_field">
        <label for="cpm_field">Delivery Location</label>
        <input id="location" type="text" name="location" value="<?php echo ( !empty($location)) ? $location : ""; ?>" >
    </p>

    <p class="meta-options cpm_field">
        <label for="cpm_field">Date & Time</label>
        <input id="deliver_date" type="datetime-local" name="deliver_date" value="<?php echo ( !empty($deliver_date)) ? $deliver_date : ""; ?>" >
    </p>

    <p class="meta-options cpm_field">
        <label for="cpm_field">Flight Number</label>
        <input id="flight_number" type="text" name="flight_number" value="<?php echo ( !empty($flight_number)) ? $flight_number : ""; ?>" >
    </p>

    <p class="meta-options cpm_field">
        <label for="cpm_field">Delivery Distance</label>
        <input id="delivery_distance" type="text" name="delivery_distance" value="<?php echo ( !empty($delivery_distance)) ? $delivery_distance : "0 Km"; ?>" >
    </p>

    <p class="meta-options cpm_field">
        <label for="cpm_field">Delivery Shop</label>
        <input id="delivery_shop" type="text" name="delivery_shop" value="<?php echo ( !empty($delivery_shop)) ? $delivery_shop : ""; ?>" >
    </p>


<!--     <p class="meta-options cpm_field">
        <label for="cpm_field">Quantity</label>
        <input id="quantity" type="number" name="quantity" value="<?php echo ( !empty($quantity)) ? $quantity : 1; ?>">
    </p> -->

</div>

<style type="text/css">
    p.meta-options.cpm_field {
        flex: 1 1 185px;
        margin-right: 15px;
    }

    p.meta-options.cpm_field input[type="text"] {
        width: 100%;
    }
    .meta-box-sortables select {
        max-width: 100%;
        min-width: 184px;
        width: 100%;
    }
    p.meta-options.cpm_field input[type="checkbox"] {
        margin-left: 20px;
    }

</style>