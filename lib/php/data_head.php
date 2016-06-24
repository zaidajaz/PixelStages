<?php
	session_start();

	require_once 'functions.php';

	if(isset($_GET["delete"])){
		$id = $_GET["delete"];
		removeFromDb($id);
	}

	if(isset($_GET["color"]) && isset($_GET["id"])){
		if(isValid($_GET["color"])){
			if(isValid($_GET["id"])){
				$color = $_GET["color"];
				$id = $_GET["id"];
				updateColor($color, $id);
			}

		}
	}

	if(isset($_GET["note"]) && isset($_GET["id"])){
		$note = $_GET["note"];
		$id = $_GET["id"];
		saveNote($note,$id);
	}

	if(isset($_GET["q"])){
		if(isValid($_GET["q"])){
			$searchQuery = $_GET["q"];
			searchbyQ($searchQuery);
		}
	}

	if(isset($_GET["update"])){
		if(isValid($_GET["update"]) && isValid($_GET["value"])){
			$updateField = $_GET["update"];
			$value = $_GET["value"];
			$id = $_GET["id"];
			$ids = explode(',', $id);
			$condition = '';
			foreach($ids as $index=>$idd)
			//id = 10 or id = 11 or id = 9
				if($index == 0)
					$condition .= 'id = ' . $idd;
				else
					$condition .= ' or id = ' . $idd;
			
			bulkUpdate($updateField,$value, $condition);
		}
	}

	if(isset($_GET["adv_search"])){
		isset($_GET["advFirstName"])? $fname = $_GET["advFirstName"] : $fname = null;
		isset($_GET["advLastName"])? $lname = $_GET["advLastName"]: $lname = null;
		$name = $fname . ' ' . $lname;
		isset($_GET["advEmail"])? $email = $_GET["advEmail"] : $email = null;
		isset($_GET["advPhone"])? $phone = $_GET["advPhone"] : $phone = null;
		isset($_GET["advCity"])? $city = $_GET["advCity"] : $city = null;
		isset($_GET["advState"])? $state = $_GET["advState"] : $state = null;
		isset($_GET["advStage"])? $stage = $_GET["advStage"] : $stage = null;
		isset($_GET["advOwner"])? $owner = $_GET["advOwner"] : $owner = null;

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
		advanceSearch($where);
		//require_once 'dashboard_design.php';
		//return;
	}

	if(!isset($_GET["q"]) && !isset($_GET['adv_search'])){
		getDataTable();
	}
	
?>