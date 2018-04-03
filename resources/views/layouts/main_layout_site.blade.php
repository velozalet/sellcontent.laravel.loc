<!DOCTYPE html>
<?php
?>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="{{ (isset($meta_description)) ? $meta_description : '' }}">
    <meta name="keywords" content="{{ (isset($keywords)) ? $keywords : '' }}">
    <meta name="author" content="{{ (isset($author)) ? $author : '' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="<?=asset('favicon/favicon.ico');?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=asset('favicon/apple-touch-icon.png');?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=asset('favicon/favicon-32x32.png');?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=asset('favicon/favicon-16x16.png');?>">
    <link rel="manifest" href="<?=asset('favicon/site.webmanifest');?>">
    <link rel="mask-icon" href="<?=asset('favicon/safari-pinned-tab.svg');?>" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>{{ (isset($title)) ? $title : 'Site' }}</title>
    <!-- ____________________________________________________________________________________________________________________________ -->

        <!--boot locale CSS-files wow-animation -->
    <link href="<?=asset('wow-animation/animate.min.css');?>" rel="stylesheet" media="screen">
        <!-- boot locale CSS-files of Bootstrap -->
    <link href="<?=asset('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
        <!-- boot font-awesome Icons -->
    <link href="<?=asset('css/font-awesome.css');?>" rel="stylesheet">
        <!-- boot my custom main CSS-file -->
    <link href="<?=asset('css/style.css');?>" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body data-spy="scroll" data-target=".navbar">

<!-- HEADER -->
<header id="header" class="header">
    @yield('header')  <!--Такая директива подключает секцию с указанным именем-->
</header>
<!-- /HEADER -->

<!-- CONTENT -->
<div id="main_wrap_content" class="main-wrap-content66">
    @yield('content')  <!--Такая директива подключает секцию с указанным именем-->
</div>
<!-- /CONTENT -->

<!-- FOOTER -->
<footer id="footer" class="footer">
    @yield('footer')  <!--Такая директива подключает секцию с указанным именем-->
</footer>
<!-- /FOOTER -->


    <!-- boot on-line Stripe payment system -->
<script src="https://js.stripe.com/v3/"></script>
    <!-- boot locale jQuery library -->
<script src="<?= asset('js/jquery-3.2.1.min.js');?>" type="text/javascript"></script>
    <!-- boot locale js-files wow-animation -->
<script src="<?= asset('wow-animation/wow.min.js');?>" type="text/javascript"></script>
    <!-- boot locale js-files Bootstrap -->
<script src="<?= asset('bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <!-- boot my custom main js-file -->
<script src="<?= asset('js/main.js');?>" type="text/javascript"></script>

<!--wow-animation initialization-->
<script>
    new WOW().init();
</script>
<!--/wow-animation initialization-->

<!--Stripe payment system initialization-->
<script>
    // Create a Stripe client.
    var stripe = Stripe('pk_test_EzqhS5ESUeY4UVVzrBf8xDsu'); //Publishable key

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    //Create an instance of the card Element.
    var card = elements.create('card', {style: style});

    if( document.getElementById('card-element') ) {  //if we are on the Stripe form page
        //Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        //Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        //Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            var options = { //Additional parameters that will go into the payment information in https://dashboard.stripe.com/test/payments
                name: document.getElementById('email_customer').value,
                login_user: document.getElementById('name_customer').value,
                email_user: document.getElementById('email_customer').value,
                id_user: document.getElementById('name_customer').value,
                price_info: document.getElementById('price_article').value,
            }

            stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        /* Submit the token and the rest of your form to your server.
        The last step is to submit the token, along with any additional information that has been collected, to your server. */
        function stripeTokenHandler(token){  //console.log(token);
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            console.log( token.id );
            form.submit(); //Submit the form
        }
    } //__/if( document.getElementById('card-element') )

</script>
<!--/Stripe payment system initialization-->

</body>
</html>