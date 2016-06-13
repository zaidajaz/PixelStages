<?php include('common/dashboard/dashboard_head.php') ?>
<?php 
	require_once 'lib/php/functions.php';
	if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["addFirstName"])){
		addFormSave();
		?>
		<script>window.location = 'dashboard.php';</script>
		<?php
	}
?>
		<div id="space_content" class="xd-spaces-content"></div>
		<!-- Filters Row -->
		<div class="row xd-filters-row">
			<div class="col-lg-12 col-md-12">
				<ul>
					<li <?php if(!isset($_GET['filter'])){ ?>class="xd-filters-active-link" <?php }?>><a href="dashboard.php">All Stages</a></li>
					<li <?php if(isset($_GET["filter"]) && $_GET["filter"] == 'applied') echo "class='xd-filters-active-link'"; ?>><a href="dashboard.php?filter=applied">Applied</a></li>
					<li <?php if(isset($_GET["filter"]) && $_GET["filter"] == 'interview') echo "class='xd-filters-active-link'"; ?>><a href="dashboard.php?filter=interview">Interview</a></li>
					<li <?php if(isset($_GET["filter"]) && $_GET["filter"] == 'target') echo "class='xd-filters-active-link'"; ?>><a href="dashboard.php?filter=target">Target</a></li>
					<li <?php if(isset($_GET["filter"]) && $_GET["filter"] == 'testdone') echo "class='xd-filters-active-link'"; ?>><a href="dashboard.php?filter=testdone">Test Done</a></li>
					<li <?php if(isset($_GET["filter"]) && $_GET["filter"] == 'testschedule') echo "class='xd-filters-active-link'"; ?>><a href="dashboard.php?filter=testschedule">Test Schedule</a></li>
					<li <?php if(isset($_GET["filter"]) && $_GET["filter"] == 'win') echo "class='xd-filters-active-link'"; ?>><a href="dashboard.php?filter=win">Win</a></li>
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
		<form method="post" id="addDetailsForm action="dashboard.php">
		<div class="row xd-data-row">
			<input class="xd-add-form-submit" type="submit" value="">
			<div class="xd-floating-add-btn" onclick="$(this).toggle();$('.xd-add-hover-card').show();$('.xd-add-form-submit').show();">
					<div class="xd-floating-add-btn-extra"></div>
					<h1>+</h1>
			</div>
			<div class="xd-add-hover-card">
				<div class="xd-add-hover-sec1">
					<ul>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addFirstName" data-placeholder="First Name" placeholder="First Name"></li>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addLastName" placeholder="Last Name" data-placeholder="Last Name"></li>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addEmail" data-placeholder="Email" placeholder="Email"></li>
					</ul>
					<ul>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addPhone" placeholder="Phone" data-placeholder="Phone"></li>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addFax" placeholder="Fax" data-placeholder="Fax" ></li>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" name="addGradYear" placeholder="Graduation Year" data-placeholder="Graduation Year"></li>
					</ul>
				</div>
				<div class="xd-add-hover-sec2">
					<label class="radio-inline xd-add-hover-radio-label">
				      <input type="radio" value="Male" name="addGender">Male
				    </label>
				    <label class="radio-inline xd-add-hover-radio-label">
				      <input type="radio" value="Female" name="addGender">Female
				    </label>
				    <label class="radio-inline xd-add-hover-radio-label">
				      <input type="radio" value="Others" name="addGender">Others
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
							<select name="addStatus">
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
				</form>
			</div>
				<table class="table-responsive">
					<tr class="xd-table-header">
						<td></td>
						<td>Name</td>
						<td>Email</td>
						<td>Phone</td>
						<td>Type</td>
						<td>Address</td>
						<td>Add Note</td>
						<td>Recent Note</td>
						<td>Status</td>
					</tr>
					<tr class="xd-data-tr" onmouseover="$(this).find('.xd-row-options').show();" onmouseleave="$(this).find('.xd-row-options').hide();">
						<td>
							<div class="xd-row-options">
								<div class="xd-color-plate">
									<div data-color="#EC2E10" onclick="saveColor(this);" class="xd-color-options img-circle" style="background-color:#EC2E10;"></div>
									<div data-color="#22C60F" class="xd-color-options img-circle" style="background-color:#22C60F;"></div>
									<div data-color="#10A4BF" class="xd-color-options img-circle" style="background-color:#10A4BF;"></div>
									<div data-color="#8A0F9B" class="xd-color-options img-circle" style="background-color:#8A0F9B;"></div>
									<div data-color="#C8B10D" class="xd-color-options img-circle" style="background-color:#C8B10D;"></div>
								</div>
								<div onclick="showColorPlate(this);" class="xd-color-options img-circle"></div>
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
						<td class="xd-add-note-input-td"><input type="text" id="addNoteinput" name="addNoteinput"></td>
						<td>Recent note was good</td>
						<td>Active</td>	
						<td class="xd-color-td" style="background-color:#6AC947;"></td>				
					</tr>


					<?php
						if(isset($_SESSION["data"])){
							foreach($_SESSION["data"] as $index => $row) {

					?>
					<tr class="xd-data-tr" onmouseover="$(this).find('.xd-row-options').show();" onmouseleave="$(this).find('.xd-row-options').hide();">
						<td>
							<div class="xd-row-options">
								<div class="xd-color-plate">
									<div data-color="EC2E10" onclick="saveColor(this, <?php echo $row["id"];?>);" class="xd-color-options img-circle" style="background-color:#EC2E10;"></div>
									<div data-color="22C60F" onclick="saveColor(this, <?php echo $row["id"];?>);" class="xd-color-options img-circle" style="background-color:#22C60F;"></div>
									<div data-color="10A4BF" onclick="saveColor(this, <?php echo $row["id"];?>);" class="xd-color-options img-circle" style="background-color:#10A4BF;"></div>
									<div data-color="8A0F9B" onclick="saveColor(this, <?php echo $row["id"];?>);" class="xd-color-options img-circle" style="background-color:#8A0F9B;"></div>
									<div data-color="C8B10D" onclick="saveColor(this, <?php echo $row["id"];?>);" class="xd-color-options img-circle" style="background-color:#C8B10D;"></div>
								</div>
								<div onclick="showColorPlate(this);" class="xd-color-options img-circle"></div>
								<img src="Assets/edit.png">
								<img onclick="window.location = 'dashboard.php?delete=<?php echo $row["id"];?>';" src="Assets/delete.png">
							</div>	
						</td>
						<td class="xd-name-td" id="1" onmouseover="$(this).find('.xd-details-hover-card').show();" onmouseleave="$(this).find('.xd-details-hover-card').hide()">
							<?php echo $row["name"]; ?>
							<div class="xd-details-hover-card" id="card-1">
								 <img src="Assets/hover-triangle.png" class="xd-details-triangle">
								<div class="xd-details-hover-head">
									<h2><?php echo $row["name"]; ?></h2>
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
								<div class="xd-details-hover-body-separator"></div>
								<div class="xd-details-hover-foot">
									<a onclick="CreateSpace(<?php echo $row["id"];?>,<?php echo "'".$row["name"]."'";?>);">Open in new Space</a>
								</div>
							</div>
						</td>
						<td><?php echo $row["email"]; ?></td>
						<td><?php echo $row["phone"]; ?></td>
						<td><?php echo $row["lead_type"]; ?></td>
						<td><?php echo $row["address"]; ?></td>
						<td class="xd-add-note-input-td">
							<input type="text" onkeypress="addNote(event, this);" name="<?php echo 'addNote'.$row["id"]?>">
						</td>
						<td><?php echo $row["notes"]; ?></td>
						<td><?php echo $row["status"]; ?></td>	
						<td class="xd-color-td" style="background-color:<?php echo $row["color_tag"]; ?>;"></td>				
					</tr>
					<?php
						
						}
					}
					?>
					
				</table>
		</div>
	</div>

<?php include('common/dashboard/dashboard_footer.php') ?>