<div class="mobile-form-holder">
      <div class="custom-conatiner">
            <div class="col-half">
                <figure>
                    <img src="/wp-content/uploads/2022/10/mobile-img.jpeg" alt="image">
                </figure>
            </div>

            <div class="col-half">
              <div class="sim-header-pills">
                <div class="sim-header-pill sim-instant">INSTANT ACTIVATION</div>
                <div class="sim-header-pill sim-data">DATA ONLY</div>
              </div>
                <div class="sim-header">
                    <h2>TOP UP MOBILE</h2>
                </div>
                <div class="sim-options-wrapper">
                  <?php 
                  $args = array(
                    'post_type' => 'bsm_product',
                    'posts_per_page' => -1,
                    'fields' => 'ids',
                  );

                  $pack_id_arr = get_posts( $args );

                    $count = 1;
                    
                    if( count( $pack_id_arr ) > 0  ){
                      foreach( $pack_id_arr as $pid ){ 

                      $post = get_post($pid); 

                      if( isset( $post ) ){
                          $slug = $post->post_name;
                          $title = $post->post_title;
                      ?>
                          <div class="sim-option sim-pacakge-<?php echo $pid; ?> <?php echo ( $count == 1 ) ? 'active' : ''; ?>" data-plan="<?php echo $slug; ?>" data-id="<?php echo $pid; ?>" data-price="<?php echo get_post_meta( $pid, 'price', true); ?>">
                                  <p><i class="fas fa-check-circle"></i> <span><?php echo $title; ?></span></p>
                              </div>
                          <?php 
                          }
                          $count++;
                      } 
                  }
                  ?>
                </div>
                <div class="thank-you-notice" style="display:none;">
                  Thank you for purchase.
                </div>

                <div class="form-field">
                  <label>Iccid</label>
                  <input type="text" name="top_iccid" placeholder="Enter Iccid" required class="bsm-topup" value= "<?php echo (!empty($_GET['iccid']) ) ? $_GET['iccid']: ""; ?>" />
                </div>
               
                <div class="buy-now">
                    <button>Buy Now $<span><?php echo get_post_meta( $pack_id_arr[0], 'price', true ); ?></span></button>
                </div>
                <a href="https://stagingbikago.wpengine.com/touristsim" class="btn-buynew hidden">Order New Sim</a>
            </div>
           
        </div>
        <div class="bicago-esim-form-holder hidden">
        <?php 
        $attributes = [];
          $title = ( !empty( $attributes['title'] ) ) ? $attributes['title'] : 'Tourist';
          if( !empty( $title ) ) { 
          ?>
          <div class="esim-pkg-heading">
            <h1><?php echo wp_kses_post( $title ); ?> <span id="sim-type">eSIM</span> - <span id="sim-package"><?php get_the_title( $pack_id_arr[0] ); ?></span></h1>
          </div>

        <?php
      }
            
            foreach( $pack_id_arr as $pid ){ 

                $post = get_post($pid); 
                if( isset( $post ) ){
                $content = $post->post_content;

                if( !empty( $content ) ){ 
            ?>  
                    <div class="sim-feature-toggle sim-feature-toggle-<?php echo $pid; ?> <?php echo ( $count == 1 ) ? 'active' : ''; ?>">
                        <a class="show-more hide">Show more</a>
                        <a class="show-less">Show less</a>

                        <div class="toggle-content toggle-content-<?php echo $pid; ?>">
                          <?php echo wp_kses_post( $content ); ?>
                        </div>
                    </div>
        <?php } } $count++; } ?>

        <div id="form-holder-<?php echo $pack_id_arr[0]; ?>">
        <form action=""  class="ajax form" enctype="multipart/form-data" id="payment-form" data-package="<?php echo get_post( $pack_id_arr[0])->post_name; ?>">
            <div class="form-field">
              <h2>Top Up Form</h2>
            </div>

           
            
            <div id="payment-element">
              <!--Stripe.js injects the Payment Element-->
            </div>

            <input type = "submit" class="submitbtn" value="Pay Now">
            
            <div id="payment-message" class="hidden"></div>

            <input type="hidden" class="bsm-plan" name="plan" value ="<?php echo get_the_title( $pack_id_arr[0] ); ?>" />
            <input type="hidden" class="bsm-plan-id" name="plan-id" value ="<?php echo $pack_id_arr[0]; ?>" />
            <input type="hidden" class="bsm-sim-type" name="plan-sim-type" value ="esim" />
            <input type="hidden" name="bsm-pubkey" value="<?php echo get_option('stripe_public','pk_test_jL200rmrk7hzwzNl1WC3K6Z1');?>" id="bsm-pubkey"/>

            
            <input type="hidden" class="bsm-price" name="price" value ="<?php echo esc_html(  get_post_meta( $pack_id_arr[0], 'price', true) ); ?>" />

            <div id="msg"></div>

            <a href="<?php echo esc_url( home_url('/touristsim'));?>" class="btn-buynew hidden">Order New Sim</a>
         
        </form>
      </div>
    </div>
 </div>