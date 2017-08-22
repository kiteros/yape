<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '678030759060363','7725e1eb6eec7c555065bdc0a1025ad8' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://yapeone.com/1353/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me?locale=en_US&fields=name' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
  $data = $graphObject->asArray();
     $fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	        // To Get Facebook email ID*/
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;
        $_SESSION['FULLNAME'] = $fbfullname;
    /* ---- header location after session ----*/

  header("Location: ../actions/signin.php?c=fb");
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>
