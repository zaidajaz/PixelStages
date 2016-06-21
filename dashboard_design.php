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

					<li class="xd-filters-active-link"><a class="xd-filters-link" href="#" data-filter="">All Stages</a></li>
					<li><a class="xd-filters-link" href="#" data-filter="applied">Appllied</a></li>
					<li><a class="xd-filters-link" href="#" data-filter="interview">Interview</a></li>
					<li><a class="xd-filters-link" href="#" data-filter="target">Target</a></li>
					<li><a class="xd-filters-link" href="#" data-filter="testdone">Test Done</a></li>
					<li><a class="xd-filters-link" href="#" data-filter="testschedule">Test Schedule</a></li>
					<li><a class="xd-filters-link" href="#" data-filter="win">Win</a></li>

					<li class="xd-filters-special-1">
						<img src="Assets/change-stage.png">
						<a>Change Stage to</a>
						<img src="Assets/arrowdown.png" class="xd-arrow-down">
						<ul id="xd-stage-list">
							<li><a class="xd-filters-link" href="#" data-filter="">All Stages</a></li>
							<li><a class="xd-filters-link" href="#" data-filter="applied">Appllied</a></li>
							<li><a class="xd-filters-link" href="#" data-filter="interview">Interview</a></li>
							<li><a class="xd-filters-link" href="#" data-filter="target">Target</a></li>
							<li><a class="xd-filters-link" href="#" data-filter="testdone">Test Done</a></li>
							<li><a class="xd-filters-link" href="#" data-filter="testschedule">Test Schedule</a></li>
							<li><a class="xd-filters-link" href="#" data-filter="win">Win</a></li>
						</ul>
					</li>
					<li class="xd-filters-special-2">
						<img src="Assets/bulk-update.png">
						<a>Bulk Update</a>
						<img src="Assets/arrowdown.png" class="xd-arrow-down">
						<ul id="xd-bulk-list">
							<li>
							<div class="xd-advance-input xd-advance-input-select xd-bulk-select">
									<select name="advStage" placeholder="Field" id="bulkFieldSelect">
										<option>Field</option>
										<option value="address">Address</option>
										<option value="city">City</option>
										<option value="state">State</option>
										<option value="country">Country</option>
										<option value="zip">Zip</option>
										<option value="grad_year">Graduation Year</option>
										<option value="phone">Phone</option>
										<option value="fax">Fax</option>
										<option value="lead_type">Lead Type</option>
										<option value="source">Source</option>
										<option value="status">Status</option>
									</select>	
								</div>								
							</li>
							<li>
								<input type="text" class="xd-advance-input" onfocus="clearPlace(this);" onblur="fillPlace(this);" placeholder='Value' name="bulkValue" id="bulkValue" data-placeholder="Value">
							</li>
							<li>
								<input type="button" value="Update" id="bulkUpdatebtn" class="xd-advance-search-btn">
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<!--Data Table Row -->
		<form method="post" id="addDetailsForm" onsubmit="return validate('addDetails');" action="dashboard.php">
		<div class="row xd-data-row">
			<input class="xd-add-form-submit" id="xd-add-form-submit" type="submit" value="">
			<div class="xd-floating-add-btn" onclick="$(this).toggle();$('.xd-add-hover-card').show();$('.xd-add-form-submit').show();">
					<div class="xd-floating-add-btn-extra"></div>
					<h1>+</h1>
			</div>
			<div class="xd-add-hover-card" id="xd-add-hover-card">
				<div class="xd-add-hover-sec1">
					<ul>
						<li><input required onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" id="addFirstName" name="addFirstName" data-placeholder="First Name" placeholder="First Name"></li>
						<li><input required onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" id="addLastName" name="addLastName" placeholder="Last Name" data-placeholder="Last Name"></li>
						<li><input required onfocus="clearPlace(this);" onblur="fillPlace(this);" type="email" id="addEmail" name="addEmail" data-placeholder="Email" placeholder="Email"></li>
					</ul>
					<ul>
						<li><input required onfocus="clearPlace(this);" onblur="fillPlace(this);" type="tel" pattern="^\d{10,14}$" title="XXXXXXXXXX" maxlength="14" id="addPhone" name="addPhone" placeholder="Phone" data-placeholder="Phone"></li>
						<li><input required onfocus="clearPlace(this);" onblur="fillPlace(this);" type="tel" pattern="^\d{10,14}$" title="XXXXXXXXXX" maxlength="14" id="addFax" name="addFax" placeholder="Fax" data-placeholder="Fax" ></li>
						<li><input required onfocus="clearPlace(this);" onblur="fillPlace(this);" type="tel" pattern="^\d{4,4}$" title="e.g, 2016" maxlength="4" id="addGradYear" name="addGradYear" placeholder="Graduation Year" data-placeholder="Graduation Year"></li>
					</ul>
				</div>
				<div class="xd-add-hover-sec2">
					<label class="radio-inline xd-add-hover-radio-label">
				      <input required type="radio" value="Male" id="addGender" name="addGender">Male
				    </label>
				    <label class="radio-inline xd-add-hover-radio-label">
				      <input required type="radio" value="Female" name="addGender" id="addGender">Female
				    </label>
				    <label class="radio-inline xd-add-hover-radio-label">
				      <input required type="radio" value="Others" name="addGender" id="addGender">Others
				    </label>
				</div>
				<div class="xd-add-hover-sec1 xd-add-hover-sec3">
					<ul>
						<li><input required onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" id="addAddress" name="addAddress" placeholder="Address" data-placeholder="Address"></li>
						<li><input required onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" id="addState" name="addState" placeholder="State" data-placeholder="State"></li>
						<li><input required onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" id="addCity" name="addCity" placeholder="City" data-placeholder="City"></li>
					</ul>
				</div>
				<div class="xd-add-hover-sec1 xd-add-hover-sec4">
					<ul>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" id="addProfile" name="addProfile" placeholder="Profile" data-placeholder="Profile"></li>
						<li><input onfocus="clearPlace(this);" onblur="fillPlace(this);" type="text" id="addAttachment" name="addAttachment" placeholder="Attachments" data-placeholder="Attachments"></li>
					</ul>
				</div>
				<div class="xd-add-hover-sec1 xd-add-hover-sec5">
					<ul>
						<li>
						<div class="xd-add-hover-select">
							<select name="addStatus" id="addStatus">
								<option>Status</option>
							</select>
						</div>
						</li>
						<li>
						<div class="xd-add-hover-select">
							<select name="addSource" id="addSource">
								<option>Source</option>
							</select>
						</div>
						</li>
						<li>
						<div class="xd-add-hover-select xd-add-hover-select3">
							<select name="addOwner" id="addOwner">
								<option>Owner</option>
							</select>
						</div>
							
						</li>
					</ul>
				</div>
			</div>
			</form>
			<div id="xd-data-loading">
				<img src="Assets/ajax-loader.gif">
			</div>
			<!-- Table space -->
			<div id="xd-table-ajax">
				
			</div>
			<!--Table space -->
		</div>
	</div>

<?php include('common/dashboard/dashboard_footer.php') ?>