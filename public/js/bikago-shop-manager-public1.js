(function ($) {
  "use strict";

  /**
   * All of the code for your public-facing JavaScript source
   * should reside in this file.
   *
   * Note: It has been assumed you will write jQuery code here, so the
   * $ function reference has been prepared for usage within the scope
   * of this function.
   *
   * This enables you to define handlers, for when the DOM is ready:
   *
   * $(function() {
   *
   * });
   *
   * When the window is loaded:
   *
   * $( window ).load(function() {
   *
   * });
   *
   * ...and/or other possibilities.
   *
   * Ideally, it is not considered best practise to attach more than a
   * single DOM-ready or window-load handler for a particular page.
   * Although scripts in the WordPress core, Plugins and Themes may be
   * practising this, we should strive to set a better example in our own work.
   */


// var form = new FormData();
// var settings = {
//   "url": "https://devapi.flexiroam.com/user/view/v1",
//   "method": "POST",
//   "timeout": 0,
//   "headers": {
//     "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoiODQiLCJmaXJzdF9uYW1lIjoiRGVtbyIsImxhc3RfbmFtZSI6IkxvYWQgUGxhbiAtIEludGVybmFsIiwiYnVzaW5lc3NfbmFtZSI6IkRlbW8gTG9hZCBQbGFuIiwiY3VycmVuY3kiOiJVU0QiLCJ0aW1lem9uZSI6IkdNVCIsInRpbWV6b25lX2RpZmYiOiIrMDA6MDAiLCJhZGRyZXNzIjpudWxsLCJjaXR5IjpudWxsLCJzdGF0ZSI6bnVsbCwicG9zdGNvZGUiOm51bGwsImNvdW50cnkiOiJNYWxheXNpYSIsImFkbWluIjoiMCIsImtleSI6ImNxOXo0c3gxdGJwNWZlYW5qbTh5IiwidGltZXN0YW1wIjoxNjY1NzE2MjE1fQ.utBzTL4wM3LpiqZ5QGs3rkbV1WRH9Nf3AqU2pCaqyRE"
//   },
//   "processData": false,
//   "mimeType": "multipart/form-data",
//   "contentType": false,
//   "data": form
// };

// $.ajax(settings).done(function (response) {
//   console.log(response);
// });

// var form = new FormData();
// form.append("email", "demoloadplan@flexiroam.com");
// form.append("password", "Demo!!!re!!1");

// var settings = {
//   "url": "https://devapi.flexiroam.com/user/login/v1",
//   "method": "POST",
//   "timeout": 0,
//   "processData": false,
//   "mimeType": "multipart/form-data",
//   "contentType": false,
//   "data": form
// };

// $.ajax(settings).done(function (response) {
//   console.log(response);
// });

})(jQuery);
jQuery(document).ready(function ($) {

  // $("form.ajax-kyc").on("submit", function (e) {
  //   e.preventDefault();
  //   var imei = $(".ajax-kyc .bsm-imei").val();
  //  // var passport = $(".ajax-kyc .bsm-passport").val();
  //   var kyc_user_name = $(".ajax-kyc .kyc_user_name").val();
  //   var kyc_order = $(".ajax-kyc .kyc_order").val();

  //   file_data = $(".ajax-kyc .bsm-passport").prop('files')[0];
  //   form_data = new FormData();
  //   form_data.append('file', file_data);
  //   form_data.append('action', 'file_upload');
  //   form_data.append('security', bsm_ajax.security);

  //   $.ajax({
  //     url: bsm_ajax.url,
  //     type: "POST",
  //     dataType: "type",
  //     contentType: false,
  //     processData: false,
  //     data: {
  //       action: "set_kyc_form",
  //       imei: imei,
  //       passport: file_data,
  //       kyc_user_name: kyc_user_name,
  //       kyc_order: kyc_order,
  //     },
  //     success: function (response) {
  //       //console.log(response);
  //       //$(this).children(".success_msg").css("display","block");
  //     },
  //     error: function (data) {
  //       //$(this).children(".error_msg").css("display","block");      }
  //     },
  //   });
  // });


  $("select.bsm-company").change(function(){
      var selectedSIM = $(this).children("option:selected").val();

      $('#bsm-sim-company').val( selectedSIM );
  });

  $("select.bsm-airport").change(function(){
      var selectedAirport = $(this).children("option:selected").val();

      $('#full_location').val( selectedAirport );
  });
  
  $(".show-more").on("click", function () {
    $(this).siblings(".toggle-content").removeClass("hide");
    $(this).siblings(".show-less").removeClass("hide");
    $(this).addClass("hide");
  });
  $(".show-less").on("click", function () {
    $(this).siblings(".toggle-content").addClass("hide");
    $(this).siblings(".show-more").removeClass("hide");
    $(this).addClass("hide");
  });

  $(".sim-option").click(function () {
    $(".sim-option").removeClass("active");
    $(this).addClass("active");
    var text = $(this).find("span").text();
    $('.esim-pkg-heading').find("#sim-package").text( text );

    var price = $(this).attr('data-price');
    var plan = $(this).attr('data-plan');
    var plan_id = $(this).attr('data-id');

    $('.buy-now').find("span").text( price );
    $(this).closest( '.mobile-form-holder').find(".bsm-price").val( price );
    $(this).closest( '.mobile-form-holder').find(".bsm-plan").val( plan );
    $(this).closest( '.mobile-form-holder').find(".bsm-plan-id").val( plan_id );

    var pid = $(this).attr('data-id');
    $('.sim-feature-toggle').removeClass( 'active' );
    $('.sim-feature-toggle-' + pid ).addClass( 'active' );
  });

  $(".toggle-icon").click(function () {
    $(".toggle-icon").removeClass("active");
    $(this).addClass("active");
    var sim_type = $(this).find("input").val();
    if( sim_type == 'physical-sim'){
      sim_text = 'SIM';
      $('.ajax.form').find('.form-physical-sim-section').addClass( 'active' );
      
    }else{
      sim_text = 'eSIM'
      $('.ajax.form').find('.form-physical-sim-section').removeClass( 'active' );
    }
    $(this).closest('.mobile-form-holder').find('#sim-type').text( sim_text );
    $("#payment-form .bsm-sim-type").val( sim_text );
  });



  $(".buy-now button").on("click", function () {
      $(this).closest( '.mobile-form-holder').children(".bicago-esim-form-holder").toggleClass("hidden");
  });

  // $(".sim-header-pill").click(function () {
  //   $(this).toggleClass("has-checked");
  // });

  // $(".sim-instant").click(function () {
  //   $(this).toggleClass("has-checked");
  //   $(".sim-instant").closest( '.mobile-form-holder').find(".bsm-instant").val( "0" );
  //   $('.sim-instant.has-checked').closest( '.mobile-form-holder').find(".bsm-instant").val( "1" );
  // });

  // $(".sim-data").click(function () {
  //   $(this).toggleClass("has-checked");
  //   $(".sim-data").closest( '.mobile-form-holder').find(".bsm-data").val( "0" );
  //   $('.sim-data.has-checked').closest( '.mobile-form-holder').find(".bsm-data").val( "1" );
  // });

  $(".physical-sim-option").click(function () {
    $(".physical-sim-option").removeClass("active");
    $('.physical-sim-option').children('input').attr( 'checked',false );
    
    $(this).addClass("active");
    $(this).find("input").attr( 'checked', 'checked' );

    var input_val = $(this).find("input").val();

    $("#plan-delivery-option").val( input_val );

    $(".physical-sim-delivery-option").removeClass("active");
    $('.ajax.form').find( "."+ input_val ).addClass('active');
  });



$('#whtspno').on('input', function() {

    var countrycode = $('#bsm-countrycode').val();
    var whatno = $('#whtspno').val();

    $('#bsm-whatsapp').val( countrycode + '-' + whatno );

    // console.log(preg_match("^([0-9]{3})?[-. ]([0-9]{3})[-. ]([0-9]{4})$", str));
    // console.log(preg_match("^([0-9]{3})?[-. ]([0-9]{3})[-. ]([0-9]{4})$","000.000.0000"));
    // var test = preg_match("^([0-9]{3})?[-. ]([0-9]{3})[-. ]([0-9]{4})$", str);

    // if( test == false ){
    //   $(this).addClass('error-phone');
    //   $('.err-mobile').css('display','block');
    //   $( '.submitbtn').addClass('btn-mobile-disabled');
    // }else{
    //    $(this).removeClass('error-phone');
    //   $('.err-mobile').css('display','none');
    //   $( '.submitbtn').removeClass('btn-mobile-disabled');
    // }


    // console.log(preg_match("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,6}$","test"))
    // console.log(preg_match("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,6}$","what@google.com"))

});


// $('.bsm-email').on('input', function() {

// var str = $(this).val();
// // console.log( 'email' );
// // console.log(preg_match("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,6}$",str));

// var test = preg_match("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,6}$",str);

// if( test == false ){
//   $(this).addClass('error-email');
//   $('.err-email').css('display','block');
//   $( '.submitbtn').addClass('btn-email-disabled');
// }else{
//   $(this).removeClass('error-email');
//   $('.err-email').css('display','none');
//   $( '.submitbtn').removeClass('btn-email-disabled');
// }

// });


// TO ANSWER QUESTION https://stackoverflow.com/questions/72474796/how-to-append-country-code-in-two-different-input-fields-using-javacscript-and-j

// const product = urlParams.get('product')
// console.log(product);

//const phoneInputField = document.querySelector("#smsno");
const phoneInputField2 = document.querySelector("#whtspno");
//const phoneInput = window.intlTelInput(phoneInputField, {});
const phoneInput2 = window.intlTelInput(phoneInputField2, {}); 
window.addEventListener('load', function() {
  // Get the forms we want to add validation styles to
  var forms = document.getElementsByClassName('needs-validation');
  // Loop over them and prevent submission
  var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
}, false);

jQuery(document).ready(function( $ ) {

  $('.whatsappForm .iti__flag-container').click(function() {
    var countryCode = $('.whatsappForm .iti__selected-flag').attr('title');
    var countryCode = countryCode.replace(/[^0-9]/g,'');
    //$('#whtspno').val("");
    //$('#bsm-whatsapp').val("+"+countryCode+" "+ $('#whtspno').val());
    $('#bsm-countrycode').val("+"+countryCode);

  });
});
// https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/js/intlTelInput.min.js
// https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/js/intlTelInput.min.js
// /https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css
 //https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/css/intlTelInput.css

});
