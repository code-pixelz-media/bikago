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


})(jQuery);
jQuery(document).ready(function ($) {


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

});

if( $( '#whtspno').length > 0 ){
const phoneInputField2 = document.querySelector("#whtspno");
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
}

jQuery(document).ready(function( $ ) {

  $('.whatsappForm .iti__flag-container').click(function() {
    var countryCode = $('.whatsappForm .iti__selected-flag').attr('title');
    var countryCode = countryCode.replace(/[^0-9]/g,'');
    //$('#whtspno').val("");
    //$('#bsm-whatsapp').val("+"+countryCode+" "+ $('#whtspno').val());
    $('#bsm-countrycode').val("+"+countryCode);

  });

  var input = document.querySelector("#whtspno");
  window.intlTelInput(input, {
    // allowDropdown: true, // whether or not to allow the dropdown
    // autoHideDialCode: true, // if there is just a dial code in the input: remove it on blur
    // autoPlaceholder: "polite", // add a placeholder in the input with an example number for the selected country
    // customContainer: "", // modify the parentClass
    // customPlaceholder: null, // modify the auto placeholder
    // dropdownContainer: null, // append menu to specified element
    // excludeCountries: [], // don't display these countries
    // formatOnDisplay: true, // format the input value during initialisation and on setNumber
    // geoIpLookup: null,// geoIp lookup function
    // hiddenInput: "",// inject a hidden input with this name, and on submit, populate it with the result of getNumber
    // initialCountry: "",// initial country
    // localizedCountries: null,// localized country names e.g. { 'de': 'Deutschland' }
    // nationalMode: true,// don't insert international dial codes
    // onlyCountries: [],// display only these countries
    // placeholderNumberType: "MOBILE",// number type to use for placeholders
    preferredCountries: [ "" ],// the countries at the top of the list. defaults to united states and united kingdom
    // separateDialCode: false,// display the country dial code next to the selected flag so it's not part of the typed number
    // utilsScript: ""// specify the path to the libphonenumber script to enable validation/formatting    
  });

});




});
