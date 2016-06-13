<!-- <?php
 /*
	//If facebook login used
	require_once '/lib/facebook-sdk-v5/autoload.php';
	session_start();
	$fb = new Facebook\Facebook([
		'app_id' => '1738453169730920',
		'app_secret' => '05f18d428b1558c886c7c5808708ae1f',
		'default_graph_version' => 'v2.5'
		]);


	$helper = $fb->getRedirectLoginHelper();
	$session = $helper->getSessionFromRedirect();
	if(isset($session)){
		$request = new FacebookRequest($session,'GET','/me');
		$response = $request->execute();

		$graphObject = $response->getGraphObject();
		$fbid = $graphObject->getProperty('id');
		$fbFullName = $graphObject->getProperty('name');
		$fbEmail = $graphObject->getProperty('email');

		$_SESSION['FBID'] = $fbid;
		$_SESSION['FBFULLNAME'] = $fbFullName;
		$_SESSION['FBEMAIL'] = $fbEmail;

	}
	/* catch(Facebook\Exceptions\FacebookResponseException $e) {
 		 // When Graph returns an error
  		$error = 'Graph returned an error: ' . $e->getMessage();
 		exit;
	} 
	catch(Facebook\Exceptions\FacebookSDKException $e) {
  		// When validation fails or other local issues
  		$error = 'Facebook SDK returned an error: ' . $e->getMessage();
  		exit;
	} */
?> -->

<?php
   
   session_start();
   
   // added in v4.0.0
   require_once '../facebook-sdk-v5/autoload.php';
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
   $fb = new Facebook\Facebook([
		'app_id' => '1738453169730920',
		'app_secret' => '05f18d428b1558c886c7c5808708ae1f',
		'default_graph_version' => 'v2.5'
		]);
   
   // login helper with redirect_uri
   $helper = $fb->getRedirectLoginHelper('http://localhost:89/vincentleads/dashboard.php' );
   
   try {
      $session = $helper->getAccessToken();
      $session = $helper->getSessonFromRedirect();
   }catch( FacebookRequestException $ex ) {
      // When Facebook returns an error
   }catch( Exception $ex ) {
      // When validation fails or other local issues
   }
   
   // see if we have a session
   if ( isset( $session ) ) {
      // graph api request for user data
      $request = new FacebookRequest( $session, 'GET', '/me' );
      $response = $request->execute();
      
      // get response
      $graphObject = $response->getGraphObject();
      $fbid = $graphObject->getProperty('id');           // To Get Facebook ID
      $fbfullname = $graphObject->getProperty('name');   // To Get Facebook full name
      $femail = $graphObject->getProperty('email');      // To Get Facebook email ID
      
      /* ---- Session Variables -----*/
      $_SESSION['FBID'] = $fbid;
      $_SESSION['FULLNAME'] = $fbfullname;
      $_SESSION['EMAIL'] =  $femail;
      
      /* ---- header location after session ----*/
    header("Location: index.php");
   }else {
      $loginUrl = $helper->getLoginUrl('http://localhost:89/vincentleads/dashboard.php');
      header("Location: ".$loginUrl);
   }
?>