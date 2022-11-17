(function( $ ) {
  'use strict';

})( jQuery );

jQuery(document).ready(function($){

    // This is your test publishable API key.
    const stripe = Stripe("pk_test_519GhuXJEJBPvvIYo55llqULie4NBOJ2gn5bYDjH8pIaEI6LMh7VvUvfODJmcUiCOZVc97ZVC7WFUvbHN9o8aYS3R00R63VBmha");

    $('form.ajax.form-3').on('submit', function(e){
       e.preventDefault();
       var that = $(this),
       url = that.attr('action'),
       type = that.attr('method');
       var name = $('.form-1 .bsm-name').val();
       var email = $('.form-1 .bsm-email').val();
       var address = $('.form-1 .bsm-address').val();
       var imenos = $('.form-1 .bsm-imenos').val();
       var plan = $('.form-1 .bsm-plan').val();
       var price = $('.form-1 .bsm-price').val();
       $.ajax({
          url: bsm_ajax.url,
          type:"POST",
          dataType:'type',
          data: {
             action:'set_form',
             name:name,
             email:email,
             address:address,
             imenos:imenos,
             plan:plan,
             price:price,
        },  success: function(response){
            $(this).children(".success_msg").css("display","block");
        }, error: function(data){
             $(this).children(".error_msg").css("display","block");      }
        });
    //$('.ajax')[0].reset();
    });

let elements;


    initialize();
//    checkStatus();
if( $( 'form.ajax' ).length > 0 ){
document
  .querySelector("#payment-form-3")
  .addEventListener("submit", handleSubmit);
}

// document
//   .querySelector(".submitbtn")
//   .addEventListener("submit", handleSubmit);

// Fetches a payment intent and captures the client secret
async function initialize() {

  // var name1 = $('.form-1').children('.bsm-name').val();
  // var email1 = $('.form-1').children('.bsm-email').val();
  // var address1 = $('.form-1').children('.bsm-address').val();
  // var imenos1 = $('.form-1').children('.bsm-imenos').val();
  // var plan1 = $('.form-1').children('.bsm-plan').val();
  // var price1 = $('.form-1').children('.bsm-price').val();
  // // The items the customer wants to buy

  // var items = [{ 
  //     id: plan1, 
  //     price : price1, 
  //     name : name1, 
  //     email : email1, 
  //     address : address1, 
  //     imenos : imenos1
  // }];

  var form = new FormData();
  form.append("email", "demoloadplan@flexiroam.com");
  form.append("password", "Demo!!!re!!1");

  var settings = {
    "url": "https://devapi.flexiroam.com/user/login/v1",
    "method": "POST",
    "timeout": 0,
    "processData": false,
    "mimeType": "multipart/form-data",
    "contentType": false,
    "data": form
  };

  $.ajax(settings).done(function (response) {
    var clientSecret2 =  JSON.parse(response);

    var form1 = new FormData();
    var settings = {
      "url": "https://devapi.flexiroam.com/user/view/v1",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "token": clientSecret2.data.token,
      },
      "processData": false,
      "mimeType": "multipart/form-data",
      "contentType": false,
      "data": form1
    };

    $.ajax(settings).done(function (response) {
       var clientDetail =  JSON.parse(response);
    });
  });

 //  const { clientSecret } = await fetch( bsm_ajax.plugin_url + "partials/create.php", {
 //    method: "POST",
 //    headers: { "Content-Type": "application/json" },
 //    body: JSON.stringify({ items }),
 //  }).then((r) => r.json());
	// //console.log( clientSecret );

 //  elements = stripe.elements({ clientSecret });

 //  const paymentElement = elements.create("payment");
 //  paymentElement.mount("#payment-element-1");
}

async function handleSubmit(e) {
  e.preventDefault();
  setLoading(true);

  const { error } = await stripe.confirmPayment({
    elements,
    confirmParams: {
      // Make sure to change this to your payment completion page
        return_url: window.location.href,
    },
  });

  // This point will only be reached if there is an immediate error when
  // confirming the payment. Otherwise, your customer will be redirected to
  // your `return_url`. For some payment methods like iDEAL, your customer will
  // be redirected to an intermediate site first to authorize the payment, then
  // redirected to the `return_url`.
  if (error.type === "card_error" || error.type === "validation_error") {
    showMessage(error.message);
  } else {
    showMessage("An unexpected error occurred.");
  }

  //setLoading(false);
}

// Fetches the payment intent status after payment submission
async function checkStatus() {
  const clientSecret = new URLSearchParams(window.location.search).get(
    "payment_intent_client_secret"
  );
	//	console.log( clientSecret );
  if (!clientSecret) {
    return;
  }

  var { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

  switch (paymentIntent.status) {
    case "succeeded":
      showMessage("Payment succeeded!");
      break;
    case "processing":
      showMessage("Your payment is processing.");
      break;
    case "requires_payment_method":
      showMessage("Your payment was not successful, please try again.");
      break;
    default:
      showMessage("Something went wrong.");
      break;
  }
}

// ------- UI helpers -------

function showMessage(messageText) {
  const messageContainer = document.querySelector("#payment-message-1");

  messageContainer.classList.remove("hidden");
  messageContainer.textContent = messageText;


  $(".ajax .form-field").addClass("hidden");
  $(".ajax #payment-element-1").addClass("hidden");
  $(".ajax .submitbtn").addClass("hidden");

  $(".btn-buynew").removeClass("hidden");

  const current_url = window.location.href;

  const updated_url = window.location.href + '&updated_url=yes';


  // setTimeout(function () {
  //   messageContainer.classList.add("hidden");
  //   messageText.textContent = "";
  // }, 4000);
}

// Show a spinner on payment submission
function setLoading(isLoading) {
}

});
