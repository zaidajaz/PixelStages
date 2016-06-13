<?php
    require_once 'lib/google-sdk/vendor/autoload.php';
    const CLIENT_ID = "681397577150-o4ocpdal1b4b2cu24v3qattkd7saggtm.apps.googleusercontent.com";
    const CLIENT_SECRET = "0kGbPJqbGbHotIUjgwhEo8XB";
    const REDIRECT_URI = "http://localhost:89/vincentleads/dashboard.php?method=google";

    $client = new Google_Client();
    $client->setClientId(CLIENT_ID);
    $client->setClientSecret(CLIENT_SECRET);
    $client->setRedirectUri(REDIRECT_URI);
    $client->setScopes('email');
    $plus = new Google_Service_Plus($client);

    if(isset($_REQUEST['logout'])){
      session_unset();
    }
    $authUrl = $client->createAuthUrl();

?>  