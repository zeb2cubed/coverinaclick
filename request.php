<?php
require_once ('vendor/autoload.php');

use com\realexpayments\hpp\sdk\domain\HppRequest;
use com\realexpayments\hpp\sdk\RealexHpp;
use com\realexpayments\hpp\sdk\RealexValidationException;
use com\realexpayments\hpp\sdk\RealexException;

$hppRequest = (new HppRequest())
    ->addMerchantId("2Cubed")
    ->addAccount("internet")
    ->addAmount("1001")
    ->addCurrency("EUR")
    ->addAutoSettleFlag(TRUE);

$realexHpp = new RealexHpp("secret");

try {
    $requestJson = $realexHpp->requestToJson($hppRequest);
    echo $requestJson;
	
    // code here for your application to pass the JSON string to the client-side library
    return $requestJson;
}
catch (RealexValidationException $e) {
    return $e->getMessage();
}
catch (RealexException $e) {
    return $e->getMessage();
}

?>