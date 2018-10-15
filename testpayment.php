<!DOCTYPE html>
<html>
<head>
    <title>HPP Lightbox Demo</title>
    <meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/rxp-js.min.js"></script>
    <script>
    // get the HPP JSON from the server-side SDK
        jQuery(document).ready(function ($) {
			RealexHpp.setHppUrl('https://pay.sandbox.realexpayments.com/pay');
            $.getJSON("request.php", function (jsonFromServerSdk) {
                RealexHpp.init("payButtonId", "response.php", jsonFromServerSdk);
            });
        });
    </script>
</head>
<body>
<button type="button" id="payButtonId">Checkout Now</button>
</body>
</html>