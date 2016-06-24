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
		isset($_POST["addCountry"])? $country = $_POST["addCountry"]: $error = 'Country Required';
		isset($_POST["addZip"])? $zip = $_POST["addZip"]: $error = 'Zip Required';
		isset($_POST["addSecEmail"])? $secEmail = $_POST["addSecEmail"]: $error = 'Secondary Email Required';
		isset($_POST["addLeadType"])? $leadType = $_POST["addLeadType"]: $error = 'Lead Type Required';
		isset($_POST["editForm"])? $editForm = $_POST["editForm"]: $error = 'Edit Form Field Missing';

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
			isValid($country)?  : $error='Invalid Country';
			isValid($zip)?  : $error='Invalid Zip';
			isValid($secEmail)?  : $error='Invalid Secondary Email';
			isValid($leadType)?  : $error='Invalid Lead Type';
			isValid($editForm)?  : $error='Invalid Edit Value';
		}
		
		if($error == ''){
			$dataSaved = addToDB($fname,$lname,$email,$phone,$fax,$grad_year,$gender,$address,$state,$city,$status,$source,$owner,$country,$zip,$secEmail,$leadType,$editForm);
			//if($dataSaved)
				//uploadFiles($profile,$attachment);
		}
	}

	function uploadFiles($profile,$attachment){
		/*
		$target_dir = "uploads/profile";
		$target_file = $target_dir . basename($_FILES["addProfileFile"]["name"]);
		if (move_uploaded_file($_FILES["addProfileFile"]["tmp_name"], $target_file)) {
        	echo "The file ". basename( $_FILES["addProfileFile"]["name"]). " has been uploaded.";
    	}
		$target_dir = "uploads/attachment";
		$target_file = $target_dir . basename($_FILES["addAttachmentFile"]["name"]);
		if (move_uploaded_file($_FILES["addAttachmentFile"]["tmp_name"], $target_file)) {
        	echo "The file ". basename( $_FILES["addAttachmentFile"]["name"]). " has been uploaded.";
    	}*/
	}
	function isValid($input){
		return true;
	}

	function addToDB($fname,$lname,$email,$phone,$fax,$grad_year,$gender,$address,$state,$city,$status,$source,$owner,$country,$zip,$secEmail,$leadType,$editForm){
		require_once 'config/dbConfig.php';
		$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
		if($con){
			if(mysqli_select_db($con, DB_NAME)){
				$name = $fname.' '.$lname;
				if($editForm==-1){
					$sql = "INSERT INTO contacts(name, address, city, state, phone, grad_year, fax, email, source, status, owner, gender,country,zip,sec_email,lead_type) VALUES ('$name','$address','$city','$state','$phone','$grad_year','$fax','$email','$source','$status','$owner','$gender','$country','$zip','$secEmail','$leadType');";
				}
				else{
					$sql = "Update contacts set name = '$name', address='$address', city = '$city', state = '$state', phone = '$phone', grad_year = '$grad_year', fax = '$fax', email = '$email', source = '$source', status = '$status', owner = '$owner', gender= '$gender',country = '$country',zip = '$zip',sec_email = '$secEmail',lead_type = '$leadType' where id = '$editForm';";
				}
				if(mysqli_query($con,$sql))
					return true;
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
		require_once $_SERVER["DOCUMENT_ROOT"].'/vincentLeads'.'/config/dbConfig.php';
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
		require_once $_SERVER["DOCUMENT_ROOT"].'/vincentLeads'.'/config/dbConfig.php';
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
		require_once $_SERVER["DOCUMENT_ROOT"].'/vincentLeads'.'/config/dbConfig.php';
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
		require_once $_SERVER["DOCUMENT_ROOT"].'/vincentLeads'.'/config/dbConfig.php';
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
		require_once $_SERVER["DOCUMENT_ROOT"].'/vincentLeads'.'/config/dbConfig.php';
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

	function editRow($name,$email,$phone,$addr,$status,$type){
		require_once 'config/dbConfig.php';
		$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
		if($con){
			if(mysqli_select_db($con, DB_NAME)){
				$sql = "update contacts set name = '".$name."', email = '".$email."', phone = '".$phone."', address = '".$addr."', status = '".$status."', lead_type = '".$type."' where email = '".$email."';";
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

	function logDetails($date,$ip,$email){
		require_once 'config/dbConfig.php';
		$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
		if($con){
			if(mysqli_select_db($con, DB_NAME)){
				$sql = "update users set last_login_date = '".$date."', last_login_ip = '".$ip."' where email = '".$email."';";
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
	function saveNote($note,$id){
		require_once $_SERVER["DOCUMENT_ROOT"].'/vincentLeads'.'/config/dbConfig.php';
		$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
		if($con){
			if(mysqli_select_db($con, DB_NAME)){
				$sql = "update contacts set notes = '".$note."' where id = ".$id.";";
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
	function bulkUpdate($updateField, $value, $condition){
		require_once $_SERVER["DOCUMENT_ROOT"].'/vincentLeads'.'/config/dbConfig.php';
		$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
		if($con){
			if(mysqli_select_db($con, DB_NAME)){
				$sql = "update contacts set ".$updateField." = '".$value."' where ".$condition;
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
?>