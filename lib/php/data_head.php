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

	if(!isset($_GET["q"]))
	getDataTable();
?>