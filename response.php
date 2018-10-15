<?php
require_once ('vendor/autoload.php');

use com\realexpayments\hpp\sdk\domain\HppResponse;
use com\realexpayments\hpp\sdk\RealexHpp;
use com\realexpayments\hpp\sdk\RealexValidationException;
use com\realexpayments\hpp\sdk\RealexException;

$realexHpp = new RealexHpp("secret");
// grab the response sent by the client-side library
$responseJson = $_POST['hppResponse'];

try {
    // create the response object
    $hppResponse = $realexHpp->responseFromJson($responseJson);
    $result = $hppResponse->getResult(); // 00
    $message = $hppResponse->getMessage(); // [ test system ] Authorised
    $authCode = $hppResponse->getAuthCode(); // 12345

    return $hppResponse;
}
catch (RealexValidationException $e) {
    return $e->getMessage();
}
catch (RealexException $e) {
    return $e->getMessage();
}
?>