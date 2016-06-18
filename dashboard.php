<?php 
	session_start();
	require_once 'config/dbConfig.php';
	
	if(isset($_GET["name"]) && isset($_GET["email"]) && isset($_GET["phone"]) &&isset($_GET["type"]) && isset($_GET["addr"]) && isset($_GET["status"])){
			$name = $_GET["name"];
			$email = $_GET["email"];
			$phone = $_GET["phone"];
			$addr = $_GET["addr"];
			$status = $_GET["status"];
			$type = $_GET["type"];
			require_once 'lib/php/functions.php';
			editRow($name,$email,$phone,$addr,$status,$type);
			header('Location: dashboard.php');
	}

	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		if(isset($_POST["addFirstName"])){
			require_once('dashboard_design.php');
			return;
		}

		if(isset($_POST["adv_search"])){
			
			isset($_POST["advFirstName"])? $fname = $_POST["advFirstName"] : $fname = null;
			isset($_POST["advLastName"])? $lname = $_POST["advLastName"]: $lname = null;
			$name = $fname . ' ' . $lname;
			isset($_POST["advEmail"])? $email = $_POST["advEmail"] : $email = null;
			isset($_POST["advPhone"])? $phone = $_POST["advPhone"] : $phone = null;
			isset($_POST["advCity"])? $city = $_POST["advCity"] : $city = null;
			isset($_POST["advState"])? $state = $_POST["advState"] : $state = null;
			isset($_POST["advStage"])? $stage = $_POST["advStage"] : $stage = null;
			isset($_POST["advOwner"])? $owner = $_POST["advOwner"] : $owner = null;

			$where = null;

			if($name!=null && $name != ' '){
				$where = "name like '%".$name."%'";
			}
			if($email != null){
				if($where == null) $where = "email = '".$email."'";
				else $where .= " and email = '".$email."'";
			}
			if($phone != null){
				if($where == null) $where = "phone = '".$phone."'";
				else $where .= " and phone = '".$phone."'";
			}
			if($city != null){
				if($where == null) $where = "city = '".$city."'";
				else $where .= " and city = '".$city."'";
			}
			if($state != null){
				if($where == null) $where = "state = '".$state."'";
				else $where .= " and state = '".$state."'";
			}
			if($stage != null){
				if($where == null) $where = "status = '".$stage."'";
				else $where .= " and status = '".$stage."'";
			}
			if($owner != null){
				if($where == null) $where = "owner = '".$owner."'";
				else $where .= " and owner = '".$owner."'";
			}

			require_once 'lib/php/functions.php';
			advanceSearch($where);
			require_once 'dashboard_design.php';
			return;
		}

		$email = $_POST['loginemail'];
		$password = $_POST['loginpassword'];

		$query = "select * from users where email = '".$email."';";
		if($con){
			if(mysqli_select_db($con, DB_NAME)){
				if($result = mysqli_query($con, $query)){
					if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_assoc($result)){
							$hashedPass = md5(sha1(sha1(md5(md5(sha1(md5($password)))))));
							if($hashedPass == $row['password']){
								$_SESSION['username'] = $row['name'];
								$_SESSION['email'] = $email;
								require_once 'lib/php/functions.php';
								date_default_timezone_set("Asia/Kolkata");
								logDetails(date("Y-m-d H:m:s"),$_SERVER["REMOTE_ADDR"],$email);
							}
							else{
								header('Location: login.php?error=password');
							}
						}
					}
					else{
						header('Location: login.php?error=email');
					}
				}
				else{
					echo'Error Fetching results';
				}
			}
			else{
				echo 'Cannot connect to DB';
			}
		}
		else{
			echo 'Connection Error';
		}
		mysqli_close($con);
      }
	else{
		if(!isset($_SESSION['username']) && !isset($_GET['method'])){

		require_once '/lib/facebook-sdk-v5/autoload.php';
		$fb = new Facebook\Facebook([
			'app_id' => '1738453169730920',
			'app_secret' => '05f18d428b1558c886c7c5808708ae1f',
			'default_graph_version' => 'v2.5'
			]);
		$helper = $fb->getRedirectLoginHelper();
		$accessToken = $helper->getAccessToken();
		if($accessToken == null) header('Location: index.php?login=1');
		$oAuth2Client = $fb->getoAuth2Client();
		if(!$accessToken->isLongLived()){
			$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
		}
		try {
		  // Returns a `Facebook\FacebookResponse` object
		  $response = $fb->get('/me?fields=id,name,email', $accessToken);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
		$user = $response->getGraphUser();
		$email = $user['email'];
		$name = $user['name'];
		$query = "select * from users where email = '".$email."';";
		if($con){
			if(mysqli_select_db($con, DB_NAME)){
				if($result = mysqli_query($con, $query)){
					if(mysqli_num_rows($result) > 0){
						$_SESSION['username'] = $name;
						$_SESSION['email'] = $email;
						require_once 'lib/php/functions.php';
						date_default_timezone_set("Asia/Kolkata");
						logDetails(date("Y-m-d H:m:s"),$_SERVER["REMOTE_ADDR"],$email);
					}
					else{
						header('Location: index.php?error=email');
					}
				}
				else{
					echo'Error Fetching results';
				}
			}
			else{
				echo 'Cannot connect to DB';
			}
		}
		else{
			echo 'Connection Error';
		}
		mysqli_close($con);
	}

	if(!isset($_SESSION['username']) && isset($_GET['method'])){
		if($_GET['method'] == 'google'){

				require_once 'lib/login-connect/googleloginSetup.php';

				if(isset($_GET['code'])){
			      $client->authenticate($_GET['code']);
			      $_SESSION['accessToken'] = $client->getAccessToken();
			    }

				if(isset($_SESSION['accessToken'])){
				      //$client->setAccesToken($_SESSION['accessToken']);
				      $me = $plus->people->get('me');
				      $id = $me['id'];
				      $name = $me['displayName'];
				      $email = $me['emails'][0]['value'];
				      $query = "select * from users where email = '".$email."';";
				      if($con){
						if(mysqli_select_db($con, DB_NAME)){
								if($result = mysqli_query($con, $query)){
									if(mysqli_num_rows($result) > 0){
										$_SESSION['username'] = $name;
										$_SESSION['email'] = $email;
										require_once 'lib/php/functions.php';
										date_default_timezone_set("Asia/Kolkata");
										logDetails(date("Y-m-d H:m:s"),$_SERVER["REMOTE_ADDR"],$email);
									}
									else{
										header('Location: index.php?error=email');
									}
								}
								else{
									echo'Error Fetching results';
								}
							}
							else{
								echo 'Cannot connect to DB';
							}
						}
						else{
							echo 'Connection Error';
						}
						mysqli_close($con);
			    }

    	}
	}
}
	require_once 'lib/php/functions.php';
	getDataTable();
 	require_once('dashboard_design.php');
?>