(function ($) {
  "use strict";
})(jQuery);

jQuery(document).ready(function ($) {
  var pubkey = $("#bsm-pubkey").val();
  // This is your test publishable API key.
  const stripe = Stripe( pubkey );
  //console.log( stripe );

  $("form.ajax.form").on("submit", function (e) {

    e.preventDefault();
    var that = $(this),
      url = that.attr("action"),
      type = that.attr("method");
    var name = $("#payment-form .bsm-name").val();
    var email = $("#payment-form .bsm-email").val();
    var imenos = $("#payment-form .bsm-imenos").val();
    var plan = $("#payment-form .bsm-plan").val();
    var price = $("#payment-form .bsm-price").val();
    var whatsapp = $("#payment-form .bsm-whatsapp").val();
    var plan_id = $("#payment-form .bsm-plan-id").val();
    var sim_type = $("#payment-form .bsm-sim-type").val();
    var instant = $("#payment-form .bsm-instant").val();
    var sim_data = $("#payment-form .bsm-data").val();
    var distance = $("#payment-form #bsm-distance").val();
    var sim_company = $("#payment-form #bsm-sim-company").val();

    var deliver_option = $("#payment-form #plan-delivery-option").val();
    var deliver_date1 = $("#payment-form .bsm-deliver-date").val();
    var deliver_date3 = $("#payment-form .bsm-deliver-date-3").val();
    var flight_number = $("#payment-form .bsm-flight-number").val();
    var delivery_distance = $("#payment-form .bsm-deliver-distance").val();
    var delivery_shop = $("#payment-form .bsm-deliver-shop").val();
    var delivery_distance = 0;  

    if( delivery_shop == "" || delivery_shop == undefined ){
        delivery_shop = "Bikago Shop";
    }

    var location1 = $("#payment-form .bsm-location-1").val();
    var location2 = $("#payment-form .bsm-location-2").val();
    var location3 = $("#payment-form .bsm-location-3").val();


    if (deliver_option == "delivery-gojek" && location2 != "") {
      var location = location2;
      var deliver_date = "";
    } else if (deliver_option == "collect-bikago-shop" && location3 != "") {
      var location = location3;
      var deliver_date = deliver_date3;
    } else if (deliver_option == "free-delivery-airport" && location1 != "") {
      var location = location1;
      var deliver_date = deliver_date1;
    } else {
      var location = "Bali";
      var deliver_date = '';
    }

    $.ajax({
      url: bsm_ajax.url,
      type: "POST",
      dataType: "type",
      data: {
        action: "set_form",
        name: name,
        email: email,
        imenos: imenos,
        plan: plan,
        price: price,
        whatsapp: whatsapp,
        plan_id: plan_id,
        sim_type: sim_type,
        instant: instant,
        sim_data: sim_data,
        deliver_date: deliver_date,
        flight_number: flight_number,
        location: location,
        delivery_distance: delivery_distance,
        delivery_shop: delivery_shop,
        deliver_option: deliver_option,
        distance: distance,
        sim_company:sim_company,
      },
      success: function (response) {
        $(this).children(".success_msg").css("display", "block");
      },
      error: function (data) {
        $(this).children(".error_msg").css("display", "block");
      },
    });
  });

  let elements;

  if ($("form.ajax").length > 0) {
    initialize();
    checkStatus();

    document
      .querySelector("#payment-form")
      .addEventListener("submit", handleSubmit);
  }

  // Fetches a payment intent and captures the client secret
  async function initialize() {
    var name = $(".form").children(".bsm-name").val();
    var email = $(".form").children(".bsm-email").val();
    var imenos = $(".form").children(".bsm-imenos").val();
    var plan = $(".form").children(".bsm-plan").val();
    var price = $(".form").children(".bsm-price").val();
    var plan_id = $(".form").children(".bsm-plan-id").val();
    var sim_type = $(".form").children(".bsm-sim-type").val();
    var instant = $(".form").children(".bsm-instant").val();
    var sim_data = $(".form").children(".bsm-data").val();
    var whatsapp = $(".form").children(".bsm-whatsapp").val();

    // The items the customer wants to buy

    if( price == "" || price == undefined ){
      price = 0;
    }

    var items = [
      {
        id: plan,
        price: price,
        name: name,
        email: email,
        plan_id: plan_id,
        sim_type: sim_type,
        instant: instant,
        sim_data: sim_data,
        whatsapp: whatsapp,
      },
    ];

    const { clientSecret } = await fetch(
      bsm_ajax.plugin_url + "partials/create.php",
      {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ items }),
      }
    ).then((r) => r.json());
    //console.log(clientSecret);

    elements = stripe.elements({ clientSecret });

    const paymentElement = elements.create("payment");
    paymentElement.mount("#payment-element");
  }

  async function handleSubmit(e) {
    e.preventDefault();

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
  }

  // Fetches the payment intent status after payment submission
  async function checkStatus() {
    const clientSecret = new URLSearchParams(window.location.search).get(
      "payment_intent_client_secret"
    );
    // console.log(clientSecret);
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
    const messageContainer = document.querySelector("#payment-message");

    messageContainer.classList.remove("hidden");
    messageContainer.textContent = messageText;

    $(".ajax .form-field").addClass("hidden");
    $(".ajax #payment-element").addClass("hidden");
    $(".ajax .submitbtn").addClass("hidden");
    $(".ajax .form-row").addClass("hidden");
    $(".sim-options-wrapper").addClass("hidden");
    $(".sim-header-pills").css("display", "none");

    $(".thank-you-notice").css("display","block");
    

    $(".toggle-switch").addClass("hidden");

    $(".buy-now").addClass("hidden");

    $(".btn-buynew").removeClass("hidden");


    const current_url = window.location.href ;

    const updated_url = window.location.href + "&updated_url=yes";


  }
});
