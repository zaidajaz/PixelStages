<?php
	function addFormSave(){
		$error ='';
		
		isset($_POST["addFirstName"])? $fname = $_POST["addFirstName"]: $error = 'First Name Required';
		isset($_POST["addLastName"])? $lname = $_POST["addLastName"]: $error = 'Last Name Required';
		isset($_POST["addEmail"])? $email = $_POST["addEmail"]: $error = 'Email Required';
		isset($_POST["addPhone"])? $phone = $_POST["addPhone"]: $error = 'Phone Required';
		isset($_POST["addFax"])? $fax = $_POST["addFax"]: $error = 'Fax Required';
		isset($_POST["addGradYear"])? $grad_year = $_POST["addGradYear"]: $error = 'Graduation Year Required';
		isset($_POST["addGender"])? $gender = $_POST["addGender"]: $error = 'Gender Required';
		isset($_POST["addAddress"])? $address = $_POST["addAddress"]: $error = 'Address Required';
		isset($_POST["addState"])? $state = $_POST["addState"]: $error = 'State Required';
		isset($_POST["addCity"])? $city = $_POST["addCity"]: $error = 'City Required';
		isset($_POST["addStatus"])? $status = $_POST["addStatus"]: $error = 'Status Required';
		isset($_POST["addSource"])? $source = $_POST["addSource"]: $error = 'Source Required';
		isset($_POST["addOwner"])? $owner = $_POST["addOwner"]: $error = 'Owner Required';

		if($error == ''){
			isValid($fname)?  : $error='Invalid First Name';
			isValid($lname)?  : $error='Invalid Last Name';
			isValid($email)?  : $error='Invalid Email';
			isValid($phone)?  : $error='Invalid Phone';
			isValid($fax)?  : $error='Invalid Fax';
			isValid($grad_year)?  : $error='Invalid Graduation Year';
			isValid($gender)?  : $error='Invalid Gender';
			isValid($address)?  : $error='Invalid Address';
			isValid($state)?  : $error='Invalid State';
			isValid($city)?  : $error='Invalid City';
			isValid($status)?  : $error='Invalid Status';
			isValid($source)?  : $error='Invalid source';
			isValid($owner)?  : $error='Invalid Owner';
		}

		if($error == ''){
			addToDB($fname,$lname,$email,$phone,$fax,$grad_year,$gender,$address,$state,$city,$status,$source,$owner);
		}
	}

	function isValid($input){
		return true;
	}

	function addToDB($fname,$lname,$email,$phone,$fax,$grad_year,$gender,$address,$state,$city,$status,$source,$owner){
		require_once 'config/dbConfig.php';
		$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
		if($con){
			if(mysqli_select_db($con, DB_NAME)){
				$name = $fname.' '.$lname;
				$sql = "INSERT INTO contacts(name, address, city, state, phone, grad_year, fax, email, source, status, owner, gender) VALUES ('$name','$address','$city','$state','$phone','$grad_year','$fax','$email','$source','$status','$owner','$gender');";
			mysqli_query($con,$sql);
			}
			else{
				die('Cannot connect to DB');
			}
		}
		else{
			die('Connection Error');
		}
		mysqli_close($con);
	}

	function getDataTable(){
		$filter = '';
		if(isset($_GET["filter"])){
			 if(isValid($_GET["filter"])){
			 	$filter = $_GET["filter"];
			 }
		}
		require_once 'config/dbConfig.php';
		$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
		if($con){
			if(mysqli_select_db($con, DB_NAME)){
				if($filter == null){
					$sql = "select * from contacts order by id desc";
				}
				else{
					$sql = "select * from contacts where status = '".$filter."' order by id desc;"; 
					$_SESSION["data"] = null;
				}
				if($results = mysqli_query($con,$sql)){
					if(mysqli_num_rows($results) > 0){
						$i = 0;
						$_SESSION["data"] = null;
						while($row = mysqli_fetch_assoc($results)){
							$a = array(
								"id" => $row['id'],
								"name" => $row['name'],
								"color_tag" => $row['color_tag'],
								"address" => $row['address'],
								"city" => $row['city'],
								"state" => $row['state'],
								"country" => $row['country'],
								"zip" => $row['zip'],
								"phone" => $row['phone'],
								"grad_year" => $row['grad_year'],
								"fax" => $row['fax'],
								"email" => $row['email'],
								"sec_email" => $row['sec_email'],
								"lead_type" => $row['lead_type'],
								"source" => $row['source'],
								"status"=> $row['status'],
								"owner" => $row['owner'],
								"gender" => $row['gender'],
								"notes" => $row['notes']
							);
							$_SESSION["data"][$i] = $a;		
							$i++;			
						}
						
					}
					else{
						//die ('No Data available');
					}
				}
				else{
					die ('Error Fetching data');
				}
			}
			else{
				die('Cannot connect to DB');
			}
		}
		else{
			die('Connection Error');
		}
		mysqli_close($con);
	}

	function getDataForDetails($id){
		if(isset($_SESSION["data"])){
			foreach($_SESSION["data"] as $index => $row) {
				if($row["id"] == $id){
					return $index;
				}
			}
		}
		return -1;
	}	

	function removeFromDb($id){
		require_once 'config/dbConfig.php';
		$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
		if($con){
			if(mysqli_select_db($con, DB_NAME)){
				$sql = "delete from contacts where id = ". $id;
				mysqli_query($con,$sql);
				$_SESSION["data"] = null;
			}
			else{
				die('Cannot connect to DB');
			}
		}
		else{
			die('Connection Error');
		}
		mysqli_close($con);
	}

	function updateColor($color, $id){
		require_once 'config/dbConfig.php';
		$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
		if($con){
			if(mysqli_select_db($con, DB_NAME)){
				$sql = "update contacts set color_tag = '#".$color."' where id = ".$id.";";
				mysqli_query($con,$sql);
			}
			else{
				die('Cannot connect to DB');
			}
		}
		else{
			die('Connection Error');
		}
		mysqli_close($con);
	}

	function searchbyQ($searchQuery){
		require_once 'config/dbConfig.php';
		$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
		if($con){
			if(mysqli_select_db($con, DB_NAME)){
				$sql = "SELECT * FROM  contacts WHERE LOWER( name ) LIKE '%".$searchQuery."%' order by id desc;";
				$_SESSION["data"] = null;
				if($results = mysqli_query($con,$sql)){
					if(mysqli_num_rows($results) > 0){
						$i = 0;
						while($row = mysqli_fetch_assoc($results)){
							$a = array(
								"id" => $row['id'],
								"name" => $row['name'],
								"color_tag" => $row['color_tag'],
								"address" => $row['address'],
								"city" => $row['city'],
								"state" => $row['state'],
								"country" => $row['country'],
								"zip" => $row['zip'],
								"phone" => $row['phone'],
								"grad_year" => $row['grad_year'],
								"fax" => $row['fax'],
								"email" => $row['email'],
								"sec_email" => $row['sec_email'],
								"lead_type" => $row['lead_type'],
								"source" => $row['source'],
								"status"=> $row['status'],
								"owner" => $row['owner'],
								"gender" => $row['gender'],
								"notes" => $row['notes']
							);
							$_SESSION["data"][$i] = $a;		
							$i++;			
						}						
					}
					else{
						//die ('No Data available');
					}
				}
				else{
					die ('Error Fetching data');
				}

			}
			else{
				die('Cannot connect to DB');
			}
		}
		else{
			die('Connection Error');
		}
		mysqli_close($con);
	}

	function advanceSearch($where){
		require_once 'config/dbConfig.php';
		$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
		if($con){
			if(mysqli_select_db($con, DB_NAME)){
				$sql = "SELECT * FROM  contacts WHERE ".$where." order by id desc;";
				$_SESSION["data"] = null;
				if($results = mysqli_query($con,$sql)){
					if(mysqli_num_rows($results) > 0){
						$i = 0;
						while($row = mysqli_fetch_assoc($results)){
							$a = array(
								"id" => $row['id'],
								"name" => $row['name'],
								"color_tag" => $row['color_tag'],
								"address" => $row['address'],
								"city" => $row['city'],
								"state" => $row['state'],
								"country" => $row['country'],
								"zip" => $row['zip'],
								"phone" => $row['phone'],
								"grad_year" => $row['grad_year'],
								"fax" => $row['fax'],
								"email" => $row['email'],
								"sec_email" => $row['sec_email'],
								"lead_type" => $row['lead_type'],
								"source" => $row['source'],
								"status"=> $row['status'],
								"owner" => $row['owner'],
								"gender" => $row['gender'],
								"notes" => $row['notes']
							);
							$_SESSION["data"][$i] = $a;		
							$i++;			
						}						
					}
					else{
						//die ('No Data available');
					}
				}
				else{
					die ('Error Fetching data');
				}

			}
			else{
				die('Cannot connect to DB');
			}
		}
		else{
			die('Connection Error');
		}
		mysqli_close($con);
	}

?>