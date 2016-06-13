<?php

	if(!isset($_SESSION))
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location: index.php?login=1');
	}
	require_once 'lib/php/functions.php';
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		if(isValid($id)){
			$index = getDataForDetails($id);
			if($index != -1)
				$row = $_SESSION["data"][$index];
			else $row = null;
		}
	}
	else{
		header('Location: dashboard.php');
	}
	//include 'common/dashboard/dashboard_head.php'; 

?>

	<!-- Status Row (Filters Modified from dashboard home) -->
		<div class="row xd-filters-row xd-status-row">
			<div class="col-lg-12">
				<h2><?php if(isset($row)){echo $row["name"];} ?></h2>
				<small><i><?php if(isset($row)){echo $row["status"];} ?></i></small>
				<div class="xd-status-row-right">
					<div class="img-circle xd-status-color-code">
						<div class="xd-color-options img-circle" style="background:<?php if(isset($row)){echo $row["color_tag"];} ?>;"></div>
					</div>
					<small>Color Tag</small>
					<label class="xd-status-right-seperator"></label>
					<img src="Assets/delete.png" class="img-circle">
					<small>Delete</small>
				</div>
			</div>
		</div>

		<!-- Contact Details Row -->
		<div class="row xd-contact-details-row">
			<div class="col-md-6">
				<div class="xd-contact-details xd-details-hover-body">
					<div class="xd-contact-details-left xd-details-hover-left">
						<ul>
							<li>Address</li>
							<li>City</li>
							<li>State</li>
							<li>Country</li>
							<li>Zip</li>
							<li>Phone</li>
							<li>Graduation year</li>
							<li>Fax</li>
							<li>Email</li>
							<li>Secondary Email</li>
							<li>Lead Type</li>
							<li>Source</li>
							<li>Status</li>
						</ul>
					</div>
					<div class="xd-contact-details-right xd-details-hover-left xd-details-hover-right">
						<ul>
							<li>
								<?php 
									$row["name"] == ''? $entry = '-': $entry = $row["name"]; 
									echo $entry;
								?>
							</li>
							<li>
								<?php 
									$row["city"] == ''? $entry = '-': $entry = $row["city"]; 
									echo $entry;
								?>
							</li>
							<li>
								<?php 
									$row["state"] == ''? $entry = '-': $entry = $row["state"]; 
									echo $entry;
								?>
							</li>
							<li>
								<?php 
									$row["country"] == ''? $entry = '-': $entry = $row["country"]; 
									echo $entry;
								?>
							</li>
							<li>
								<?php 
									$row["zip"] == ''? $entry = '-': $entry = $row["zip"]; 
									echo $entry;
								?>
							</li>
							<li>
								<?php 
									$row["phone"] == ''? $entry = '-': $entry = $row["phone"]; 
									echo $entry;
								?>
							</li>
							<li>
								<?php 
									$row["grad_year"] == ''? $entry = '-': $entry = $row["grad_year"]; 
									echo $entry;
								?>
							</li>
							<li>
								<?php 
									$row["fax"] == ''? $entry = '-': $entry = $row["fax"]; 
									echo $entry;
								?>
							</li>
							<li>
								<?php 
									$row["email"] == ''? $entry = '-': $entry = $row["email"]; 
									echo $entry;
								?>
							</li>
							<li>
								<?php 
									$row["sec_email"] == ''? $entry = '-': $entry = $row["sec_email"]; 
									echo $entry;
								?>
							</li>
							<li>
								<?php 
									$row["lead_type"] == ''? $entry = '-': $entry = $row["lead_type"]; 
									echo $entry;
								?>
							</li>
							<li>
								<?php 
									$row["source"] == ''? $entry = '-': $entry = $row["source"]; 
									echo $entry;
								?>
							</li>
							<li>
								<?php 
									$row["status"] == ''? $entry = '-': $entry = $row["status"]; 
									echo $entry;
								?>
							</li>
						</ul>
					</div>									
				</div>
			</div>
		</div>

<?php //include('common/dashboard/dashboard_footer.php') ?>