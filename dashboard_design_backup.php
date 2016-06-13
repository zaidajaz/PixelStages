<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PixelStages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <link rel="stylesheet" href="styles/fonts.css" type="text/css">
    <script type="text/javascript">
    	$('#searchBar').keypress(function(event){
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
				$('#searchForm').submit();
			}
		});

		function clearPlace(input){
			input.placeholder = "";
		}
		function fillPlace(input){
			input.placeholder = $(input).data('placeholder');
		}

		function openInSpace(srclink){
			$('.xd-space-active').removeClass('xd-space-active').addClass('xd-space-inactive');
			$( "<div class='xd-space-active'>New Space</div>" ).insertBefore( ".xd-add-space" );
		}

		
    </script>
</head>
<body>
	<nav class="xd-navbar">
		<div class="container">
			<div class="row">
				<div class="col-lg-2">
					<img src="Assets/pixelstages.png">
				</div>
				<div class="col-lg-8">
					<ul class="xd-menu-list">
						<li class="xd-menu-active-link"><a href="#">Leads and Contacts</a></li>
						<li><a href="#">Statistics</a></li>
						<li><a href="#">Manage</a></li>
						<li><a href="#">Users</a></li>
					</ul>
				</div>
				<div class="col-lg-2">
					<div class="xd-user-img"></div>
					<div class="xd-user-hover-card">
						<ul class="xd-user-list">
						  <li class="xd-user-list-item-big">
						  	<img class="xd-user-dp" src="Assets/mustache.png" class="img-circle">
						  	<h2>Hi, <?php echo $_SESSION['username'] ?></h2><small><?php echo $_SESSION['email'] ?></small>
						  </li>
						  <li class="xd-user-list-item"><img src="Assets/manage-profile.png"><a href="#">Manage Profile</a></li>
						  <li class="xd-user-list-item"><img src="Assets/settings.png"><a href="#">Settings</a></li>
						  <li class="xd-user-list-item"><img src="Assets/usergreen.png"><a href="logout.php">Sign Out</a>
						  </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row xd-search-row">
			<div class="col-lg-8">
			</div>
			<div class="col-lg-2">
				<form method="post" action="" id="searchform">
					<input type="text" class="xd-search-bar" id="searchBar">
				</form>
			</div>
			<div class="col-lg-2">
				<div class="xd-advanced-search">
					<img src="Assets/mustache.png" class="xd-advance-image-moustache">
					<small>Advanced Search</small>
					<img src="Assets/arrowdown.png" class="xd-arrow-down">
				</div>
				<div class="xd-advance-search-hover-card">
					<img src="Assets/hover-triangle.png" class="xd-advance-hover-triangle">
					<form action="" method="post">
						<div class="xd-advance-search-container">
							<div class="xd-advance-left-inputs">
								<input type="text" class="xd-advance-input" onfocus="this.placeholder='';" onblur="this.placeholder='First Name';" name="advFirstName" placeholder="First Name">
								<input type="text" onfocus="this.placeholder='';" onblur="this.placeholder='Email';" class="xd-advance-input" name="advEmail" placeholder="Email">
								<input type="text" onfocus="this.placeholder='';" onblur="this.placeholder='City';" class="xd-advance-input" name="advCity" placeholder="City">
								<div class="xd-advance-input xd-advance-input-select">
									<select name="advStage" placeholder="Stage">
										<option>Stage 1</option>
										<option>Stage 2</option>
										<option>Stage 3</option>
									</select>									
								</div>

								<div class="xd-adv-seperator xd-adv-seperator-left"></div>
								<input type="submit" value="Search" class="xd-advance-search-btn xd-adv-btn-left">
							</div>
							<div class="xd-advance-right-inputs">
								<input type="text" class="xd-advance-input" onfocus="this.placeholder='';" onblur="this.placeholder='Last Name';" name="advLastName" placeholder="Last Name">
								<input type="text" onfocus="this.placeholder='';" onblur="this.placeholder='Phone';" class="xd-advance-input" name="advPhone" placeholder="Phone">
								<input type="text" onfocus="this.placeholder='';" onblur="this.placeholder='State';" class="xd-advance-input" name="advState" placeholder="State">
								<div class="xd-advance-input xd-advance-input-select">
									<select name="advOwner" placeholder="Owner">
										<option>Owner 1</option>
										<option>Owner 2</option>
										<option>Owner 3</option>
									</select>
								</div>
								<div class="xd-adv-seperator"></div>
								<input type="submit" value="More" class="xd-advance-search-btn xd-adv-btn-right">
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<!-- Spaces Row -->
		<div class="row xd-spaces-row">
			<div class="col-lg-12">
				<div class="xd-spaces-container">
					<div class="xd-space-active">
						Space 1
					</div>
					<div class="xd-space-inactive">
						Space 2
					</div>
					<div class="xd-add-space">
					 	<h1>+</h1>
					</div>
				</div>
			</div>
		</div>

		<!-- Filters Row -->
		<div class="row xd-filters-row">
			<div class="col-lg-12">
				<ul>
					<li class="xd-filters-active-link"><a href="#">All Stages</a></li>
					<li><a href="#">Applied</a></li>
					<li><a href="#">Interview</a></li>
					<li><a href="#">Target</a></li>
					<li><a href="#">Test Done</a></li>
					<li><a href="#">Test Schedule</a></li>
					<li><a href="#">Win</a></li>
					<li class="xd-filters-special-1">
						<img src="Assets/change-stage.png">
						<a href="#">Change Stage to</a>
						<img src="Assets/arrowdown.png" class="xd-arrow-down">
					</li>
					<li class="xd-filters-special-2">
						<img src="Assets/bulk-update.png">
						<a href="#">Bulk Update</a>
						<img src="Assets/arrowdown.png" class="xd-arrow-down">
					</li>
				</ul>
				</ul>
			</div>
		</div>
		<!--Data Table Row -->
		<div class="row xd-data-row">
			<div class="xd-floating-add-btn">
					<div class="xd-floating-add-btn-extra"></div>
					<h1>+</h1>
			</div>
			<div class="xd-add-hover-card">
				<div class="xd-add-hover-sec1">
					<ul>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addFirstName" data-placeholder="First Name" placeholder="First Name"></li>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addLastNameName" placeholder="Last Name" data-placeholder="Last Name"></li>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addLastName" data-placeholder="Last Name" placeholder="Last Name"></li>
					</ul>
					<ul>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addEmail" placeholder="Email" data-placeholder="Email"></li>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addPhone" placeholder="Phone" data-placeholder="Phone" ></li>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addPhone" placeholder="Phone" data-placeholder="Phone"></li>
					</ul>
				</div>
				<div class="xd-add-hover-sec2">
					<label class="radio-inline xd-add-hover-radio-label">
				      <input type="radio" name="optradio">Male
				    </label>
				    <label class="radio-inline xd-add-hover-radio-label">
				      <input type="radio" name="optradio">Female
				    </label>
				    <label class="radio-inline xd-add-hover-radio-label">
				      <input type="radio" name="optradio">Others
				    </label>
				</div>
				<div class="xd-add-hover-sec1 xd-add-hover-sec3">
					<ul>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addAddress" placeholder="Address" data-placeholder="Address"></li>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addState" placeholder="State" data-placeholder="State"></li>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addCity" placeholder="City" data-placeholder="City"></li>
					</ul>
				</div>
				<div class="xd-add-hover-sec1 xd-add-hover-sec4">
					<ul>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addProfile" placeholder="Profile" data-placeholder="Profile"></li>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addAttachment" placeholder="Attachments" data-placeholder="Attachments"></li>
					</ul>
				</div>
				<div class="xd-add-hover-sec1 xd-add-hover-sec5">
					<ul>
						<li>
						<div class="xd-add-hover-select">
							<select name="addStaus">
								<option>Status</option>
							</select>
						</div>
						</li>
						<li>
						<div class="xd-add-hover-select">
							<select name="addSource">
								<option>Source</option>
							</select>
						</div>
						</li>
						<li>
						<div class="xd-add-hover-select xd-add-hover-select3">
							<select name="addOwner">
								<option>Owner</option>
							</select>
						</div>
							
						</li>
					</ul>
				</div>
			</div>
				<table class="table-responsive">
					<tr class="xd-data-tr" onmouseover="$(this).find('.xd-row-options').show();" onmouseleave="$(this).find('.xd-row-options').hide();">
						<td>
							<div class="xd-row-options">
								<div class="xd-color-options img-circle"></div>
								<img src="Assets/edit.png">
								<img src="Assets/delete.png">
							</div>	
						</td>
						<td class="xd-name-td" id="1" onmouseover="$(this).find('.xd-details-hover-card').show();" onmouseleave="$(this).find('.xd-details-hover-card').hide()">
							Zaid
							<div class="xd-details-hover-card" id="card-1">
								 <img src="Assets/hover-triangle.png" class="xd-details-triangle">
								<div class="xd-details-hover-head">
									<h2>Zaid Ajaz</h2>
								</div>
								<div class="xd-details-hover-head-separator"></div>
								<div class="xd-details-hover-body">
									<div class="xd-details-hover-left">
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
									<div class="xd-details-hover-left xd-details-hover-right">
										<ul>
											<li>Daryaganj</li>
											<li>Delhi</li>
											<li>Delhi</li>
											<li>India</li>
											<li>110002</li>
											<li>8800546491</li>
											<li>2017</li>
											<li>01143542759</li>
											<li>ajazzaid@gmail.com</li>
											<li>zaid@digikashmir.in</li>
											<li>Customer</li>
											<li>Direct</li>
											<li>Cool</li>
										</ul>
									</div>									
								</div>
								<div class="xd-details-hover-body-separator"></div>
								<div class="xd-details-hover-foot">
									<a href="#" onclick="openInSpace(this)">Open in new Space</a>
								</div>
							</div>
						</td>
						<td>ajazzaid@gmail.com</td>
						<td>8800546491</td>
						<td>acb</td>
						<td>Daryaganj Delhi</td>
						<td class="xd-add-note-input-td"><input type="text" name="addNoteinput"></td>
						<td>Recent note was good</td>
						<td>Active</td>	
						<td class="xd-color-td" style="background-color:#6AC947;"></td>				
					</tr>

					<tr class="xd-data-tr" onmouseover="$(this).find('.xd-row-options').show();" onmouseleave="$(this).find('.xd-row-options').hide();">
						<td>
							<div class="xd-row-options">
								<div class="xd-color-options img-circle"></div>
								<img src="Assets/edit.png">
								<img src="Assets/delete.png">
							</div>	
						</td>
						<td class="xd-name-td" id="1" onmouseover="$(this).find('.xd-details-hover-card').show();" onmouseleave="$(this).find('.xd-details-hover-card').hide()">
							Zaid
							<div class="xd-details-hover-card" id="card-1">
								 <img src="Assets/hover-triangle.png" class="xd-details-triangle">
								<div class="xd-details-hover-head">
									<h2>Zaid Ajaz</h2>
								</div>
								<div class="xd-details-hover-head-separator"></div>
								<div class="xd-details-hover-body">
									<div class="xd-details-hover-left">
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
									<div class="xd-details-hover-left xd-details-hover-right">
										<ul>
											<li>Daryaganj</li>
											<li>Delhi</li>
											<li>Delhi</li>
											<li>India</li>
											<li>110002</li>
											<li>8800546491</li>
											<li>2017</li>
											<li>01143542759</li>
											<li>ajazzaid@gmail.com</li>
											<li>zaid@digikashmir.in</li>
											<li>Customer</li>
											<li>Direct</li>
											<li>Cool</li>
										</ul>
									</div>									
								</div>
								<div class="xd-details-hover-body-separator"></div>
								<div class="xd-details-hover-foot">
									<a href="#">Open in new Space</a>
								</div>
							</div>
						</td>
						<td>ajazzaid@gmail.com</td>
						<td>8800546491</td>
						<td>acb</td>
						<td>Daryaganj Delhi</td>
						<td class="xd-add-note-input-td"><input type="text" name="addNoteinput"></td>
						<td>Recent note was good</td>
						<td>Active</td>	
						<td class="xd-color-td" style="background-color:#6AC947;"></td>				
					</tr>

					<tr class="xd-data-tr" onmouseover="$(this).find('.xd-row-options').show();" onmouseleave="$(this).find('.xd-row-options').hide();">
						<td>
							<div class="xd-row-options">
								<div class="xd-color-options img-circle"></div>
								<img src="Assets/edit.png">
								<img src="Assets/delete.png">
							</div>	
						</td>
						<td class="xd-name-td" id="1" onmouseover="$(this).find('.xd-details-hover-card').show();" onmouseleave="$(this).find('.xd-details-hover-card').hide()">
							Zaid
							<div class="xd-details-hover-card" id="card-1">
								 <img src="Assets/hover-triangle.png" class="xd-details-triangle">
								<div class="xd-details-hover-head">
									<h2>Zaid Ajaz</h2>
								</div>
								<div class="xd-details-hover-head-separator"></div>
								<div class="xd-details-hover-body">
									<div class="xd-details-hover-left">
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
									<div class="xd-details-hover-left xd-details-hover-right">
										<ul>
											<li>Daryaganj</li>
											<li>Delhi</li>
											<li>Delhi</li>
											<li>India</li>
											<li>110002</li>
											<li>8800546491</li>
											<li>2017</li>
											<li>01143542759</li>
											<li>ajazzaid@gmail.com</li>
											<li>zaid@digikashmir.in</li>
											<li>Customer</li>
											<li>Direct</li>
											<li>Cool</li>
										</ul>
									</div>									
								</div>
								<div class="xd-details-hover-body-separator"></div>
								<div class="xd-details-hover-foot">
									<a href="#">Open in new Space</a>
								</div>
							</div>
						</td>
						<td>ajazzaid@gmail.com</td>
						<td>8800546491</td>
						<td>acb</td>
						<td>Daryaganj Delhi</td>
						<td class="xd-add-note-input-td"><input type="text" name="addNoteinput"></td>
						<td>Recent note was good</td>
						<td>Active</td>	
						<td class="xd-color-td" style="background-color:#6AC947;"></td>				
					</tr>

					
				</table>
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>