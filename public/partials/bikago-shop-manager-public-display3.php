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
                    <h2>BIKAGO MOBILE</h2>
                </div>
                <div class="sim-options-wrapper">
                  <?php 
                    $pack_id_arr = [];
                    $pack_id_arr = explode(',', $attributes['ids']);

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
                <div class="toggle-switch">
                    <div class="toggle-icon e-sim active">
                        <p>ESIM</p>
                        <label class="switch">
                        <input type="radio" name="sim-type" value="esim" checked>
                        <span class="slider round"></span>
                      </label>
                    </div>

                    <div class="toggle-icon physical-sim">
                        <p>Physical SIM</p>
                        <label class="switch">
                        <input type="radio" name="sim-type" value="physical-sim">
                        <span class="slider round"></span>
                      </label>
                    </div>
                </div>
                <div class="buy-now">
                    <button>Buy Now $<span><?php echo get_post_meta( $pack_id_arr[0], 'price', true ); ?></span></button>
                </div>
                <a href="https://stagingbikago.wpengine.com/touristsim" class="btn-buynew hidden">Order New Sim</a>
            </div>
           
        </div>
        <div class="bicago-esim-form-holder hidden">
        <?php 
          $title = ( !empty( $attributes['title'] ) ) ? $attributes['title'] : '';
          if( !empty( $title ) ) { 
          ?>
          <div class="esim-pkg-heading">
            <h1><?php echo wp_kses_post( $title ); ?> <span id="sim-type">eSIM</span> - <span id="sim-package"><?php get_the_title( $pack_id_arr[0] ); ?></span></h1>
          </div>
          <div class="location-price">
          <?php }

            if( !empty( $attributes['ids']) ){
              // $bsm_post = get_post( $pack_id_arr[0], OBJECT );
              //$bsm_post = get_page_by_path( $attributes["package"], OBJECT, 'bsm_product');
                $price = get_post_meta( $pack_id_arr[0], 'price', true);
            }else{
              $price = "";
            }

            if( !empty( $attributes['location'] ) ) {
              $location = $attributes['location'];
            } else{
              $location = "";
            }

            if( !empty( $location ) ) { ?>    
            <div class="esim-pkg-location">
                <?php echo wp_kses_post( $location ); ?>
            </div>
            <?php } 

        ?>
          </div>

        <?php 
            $pack_id_arr = [];
            $pack_id_arr = explode(',', $attributes['ids']);

            $count = 1;
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
              <h2>Register in less than a minute</h2>
            </div>

            <div class="form-field">
              <label>Name</label>
              <input type="text" name="name" placeholder="Enter Your Name" required class="bsm-name" />
            </div>

            <div class="form-row">
              <div class="form-group col-md-6 whatsappForm">
                  <label>Mobile Number <i class="fab fa-whatsapp"></i></label>
                  <input type="tel" class="form-control" name="whtspno" id="whtspno" placeholder="Enter Your Whatsapp Number (eg: 9999999999 )" pattern="[0-9]{9,15}" required />
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please enter valid contact no.</div>
              </div>
          </div>
          <input type="hidden" name="countrycode" id="bsm-countrycode" class="bsm-countrycode" value="+1" />
          <input type="hidden" name="whatsapp" id="bsm-whatsapp" class="bsm-whatsapp" />

            <div class="form-field">
              <label>Email</label>
              <input type="email" name="email" placeholder="Enter your Email (eg: example@example.com )" required class="bsm-email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  />
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please enter valid email.</div>
            </div>

            <div class="form-physical-sim-section">

                <div class="form-physical-sim">
                  <div class="form-field">
                    <label>Delivery Option</label>
                    <div class="physical-sim-option active physical-sim-free">
                      <input type="radio" name="deliver-option" value="free-delivery-airport" class="bsm-deliver-option" checked /><label>Delivery Airport-Free</label> 
                    </div>
                    <div class="physical-sim-option physical-delivery-gojek">
                      <input type="radio" name="deliver-option" value="delivery-gojek" class="bsm-deliver-option" /><label>Delivery By Grab/Gojek</label> 
                    </div>
                    <div class="physical-sim-option physical-bikago-collection">
                      <input type="radio" name="deliver-option" value="collect-bikago-shop" class="bsm-deliver-option" /><label>Collect from Bikago shop</label> 
                    </div>
                  </div>
                </div>

                <div class="physical-sim-delivery-option free-delivery-airport active">
                  <b>Delivery Airport-Free</b>
                  <div class="form-field">
                    <label>Fill in date & time</label>
                    <input type="datetime-local" id="pickup-data-time1" name="Pickup_datetime" class="bsm-deliver-date" />
                  </div>

                  <div class="form-field">
                    <label>Flight No.</label>
                    <input type="text" id="flight-number" name="flight_number" class="bsm-flight-number" />
                  </div>

                  <div class="form-field">
                    <label>Airport</label>
                    <select class="bsm-airport" name="plan_airport" required>
                      <option value="international">International</option>
                      <option value="domestic">Domestic</option>
                    </select>
                  </div>
                  <input type="hidden" name="full_location" value="international" placeholder="Full Address" id="full_location" class="bsm-location-1" disabled />
                
                </div>

                <div class="physical-sim-delivery-option delivery-gojek">
                  <b>Delivery By Grab/Gojek</b>
                  <div class="pac-card" id="pac-card">
        <div>
        <!-- <div id="title">Countries</div>
        <div id="country-selector" class="pac-controls">
          <input type="radio" name="type" id="changecountry-usa" />
          <label for="changecountry-usa">USA</label>

          <input
            type="radio"
            name="type"
            id="changecountry-usa-and-uot"
            checked="checked"
          />
          <label for="changecountry-usa-and-uot"
            >USA and unincorporated organized territories</label
          >
        </div> -->
      </div> 
      <div id="pac-container">
        <input id="pac-input" type="text" placeholder="Enter a location" />
      </div>
    </div>
    <!-- <div id="map"></div> -->
  <!--   <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon" />
      <span id="place-name" class="title"></span><br />
      <span id="place-address"></span>
    </div> -->

                  <div class="form-field">
                    <div class="search-button-holder">
                        <input type="text" id="google_map_location" name="Pickup_location2" placeholder="Find Location" class="bsm-location-2" />          
                    </div>
                    <div id="webkulMap2" style="height: 280px;"></div>
                    <input type="hidden" name="latitude2" value="" placeholder="latitude" id="latitude2"/>
                    <input type="hidden" name="longitude2" value="" placeholder="longitude" id="longitude2"/>
                    <input type="hidden" name="city2" value="" placeholder="City" id="input-city2"/>
                    <input type="hidden" name="postcode2" value="" placeholder="Post Code" id="input-postcode2"/>
                    <input type="hidden" name="country_id2" value="" placeholder="country" id="input-country2"/>
                  </div>
                </div>

                <div class="physical-sim-delivery-option collect-bikago-shop">
                  <b>Collect From Bikago Shop</b>
                  <?php // echo do_shortcode('[wpsl]'); ?>
                  <div class="form-field">
                    <div class="bikago-gmap-holder">
                      <div id="webkulMap3" style="height: 280px;"></div>
                    </div>
                    <input type="hidden" name="latitude3" value="" placeholder="latitude" id="latitude3"/>
                    <input type="hidden" name="longitude3" value="" placeholder="longitude" id="longitude3"/>
                    <input type="hidden" name="city3" value="" placeholder="City" id="input-city3"/>
                    <input type="hidden" name="postcode3" value="" placeholder="Post Code" id="input-postcode3"/>
                    <input type="hidden" name="country_id3" value="" placeholder="country" id="input-country3"/>
                  </div>

                  <div class="form-field">
                    <label>Fill in date & time</label>
                    <input type="datetime-local" id="pickup-data-time3" name="Pickup_datetime3" class="bsm-deliver-date-3" />
                  </div>
                </div>
            </div>
            
            <div id="payment-element">
              <!--Stripe.js injects the Payment Element-->
            </div>

            <input type = "submit" class="submitbtn" value="submit">
            
            <div id="payment-message" class="hidden"></div>

            <input type="hidden" class="bsm-plan" name="plan" value ="<?php echo get_the_title( $pack_id_arr[0] ); ?>" />
            <input type="hidden" class="bsm-plan-id" name="plan-id" value ="<?php echo $pack_id_arr[0]; ?>" />
            <input type="hidden" class="bsm-sim-type" name="plan-sim-type" value ="esim" />
            <input type="hidden" class="bsm-instant" name="plan-instant" value ="0" />
            <input type="hidden" class="bsm-data" name="plan-data" value ="0" />
            <input type="hidden" class="bsm-location" name="plan-location" value ="Bali" />
            <input type="hidden" name="plan-delivery-option" value="free-delivery-airport" id="plan-delivery-option"/>
            <input type="hidden" name="plan-distance" value="0 Km" id="bsm-distance"/>
            <input type="hidden" name="plan-sim-company" value="SmartFren" id="bsm-sim-company"/>
            <input type="hidden" name="bsm-pubkey" value="<?php echo get_option('stripe_public','pk_test_jL200rmrk7hzwzNl1WC3K6Z1');?>" id="bsm-pubkey"/>

            <?php 
              if( !empty( $attributes['ids'] ) ){
                $price = get_post_meta( $pack_id_arr[0], 'price', true);
              }else{
                $price = "";
              }

            ?>
            
            <input type="hidden" class="bsm-price" name="price" value ="<?php echo esc_html( $price ); ?>" />

            <div id="msg"></div>

            <a href="<?php echo esc_url( home_url('/touristsim'));?>" class="btn-buynew hidden">Order New Sim</a>
         
        </form>
      </div>
    </div>
 </div>

<script>
var dt = new Date();
document.getElementById('pickup-data-time1').value=dt;
document.getElementById('pickup-data-time3').value=dt;


function preg_match (regex, str) {
  return (new RegExp(regex).test(str))
}
</script>