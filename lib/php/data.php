<?php 
	require_once 'data_head.php';
 ?>
				<table class="table-responsive">
					<tr class="xd-table-header">
						<td></td>
						<td><img src="Assets/tick.png" class="xd-select-row" data-selected='false'>Name</td>
						<td>Email</td>
						<td>Phone</td>
						<td>Type</td>
						<td>Address</td>
						<td>Add Note</td>
						<td>Recent Note</td>
						<td>Status</td>
					</tr>

					<?php
						if(isset($_SESSION["data"])){
							foreach($_SESSION["data"] as $index => $row) {

					?>
					<tr class="xd-data-tr" onmouseover="$(this).find('.xd-row-options').show();$(this).addClass('xd-edit-row');" onmouseleave="$(this).find('.xd-row-options').hide();$(this).removeClass('xd-edit-row');">
						<td>
							<div class="xd-row-options">
								<div class="xd-color-plate">
									<div data-color="EC2E10" data-id="<?php echo $row["id"] ?>" class="xd-color-select xd-color-options img-circle" style="background-color:#EC2E10;"></div>
									<div data-color="22C60F" data-id="<?php echo $row["id"] ?>" class="xd-color-select xd-color-options img-circle" style="background-color:#22C60F;"></div>
									<div data-color="10A4BF" data-id="<?php echo $row["id"] ?>" class="xd-color-select xd-color-options img-circle" style="background-color:#10A4BF;"></div>
									<div data-color="8A0F9B" data-id="<?php echo $row["id"] ?>" class="xd-color-select xd-color-options img-circle" style="background-color:#8A0F9B;"></div>
									<div data-color="C8B10D" data-id="<?php echo $row["id"] ?>" class="xd-color-select xd-color-options img-circle" style="background-color:#C8B10D;"></div>
								</div>
								<div class="xd-color-options img-circle"></div>
								<img class='xd-edit-btn' data-id = '<?php echo $row["id"]; ?>' src="Assets/edit.png">
								<img class="xd-delete-btn" data-id="<?php echo $row["id"];?>" src="Assets/delete.png">
							</div>	
						</td>
						<td class="xd-name-td" onmouseover="$(this).find('.xd-details-hover-card').show();" onmouseleave="$(this).find('.xd-details-hover-card').hide()">
							<img src="Assets/tick.png" data-selected='false' data-id="<?php echo $row["id"]; ?>" class="xd-row-select-row">
							<input type="button" value="" class="xd-edit-btn-save" onclick="saveEdit(this);">
							<input disabled id="editName" class="xd-table-edit-inputs" type="text" value="<?php echo $row["name"];?>">
							<div class="xd-details-hover-card">
								 <img src="Assets/hover-triangle.png" class="xd-details-triangle">
								<div class="xd-details-hover-head">
									<h2><?php echo $row["name"]; ?></h2>
								</div>
								<div class="xd-details-hover-head-separator"></div>
								<div class="xd-details-hover-body">
									<div class="xd-details-hover-left">
										<ul>
											<li>Gender</li>
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
											<li>Owner</li>
										</ul>
									</div>
									<div class="xd-details-hover-left xd-details-hover-right">
										<ul>
											<li id="xd-data-gender">
												<?php 
													$row["gender"] == ''? $entry = '-': $entry = $row["gender"]; 
													echo $entry;
												?>
											</li>
											<li id="xd-data-addr">
												<?php 
													$row["address"] == ''? $entry = '-': $entry = $row["address"]; 
													echo $entry;
												?>
											</li>
											<li id="xd-data-city">
												<?php 
													$row["city"] == ''? $entry = '-': $entry = $row["city"]; 
													echo $entry;
												?>
											</li>
											<li id="xd-data-state">
												<?php 
													$row["state"] == ''? $entry = '-': $entry = $row["state"]; 
													echo $entry;
												?>
											</li>
											<li id="xd-data-country">
												<?php 
													$row["country"] == ''? $entry = '-': $entry = $row["country"]; 
													echo $entry;
												?>
											</li>
											<li id="xd-data-zip">
												<?php 
													$row["zip"] == ''? $entry = '-': $entry = $row["zip"]; 
													echo $entry;
												?>
											</li>
											<li id="xd-data-phone">
												<?php 
													$row["phone"] == ''? $entry = '-': $entry = $row["phone"]; 
													echo $entry;
												?>
											</li>
											<li id="xd-data-gradYear">
												<?php 
													$row["grad_year"] == ''? $entry = '-': $entry = $row["grad_year"]; 
													echo $entry;
												?>
											</li>
											<li id="xd-data-fax">
												<?php 
													$row["fax"] == ''? $entry = '-': $entry = $row["fax"]; 
													echo $entry;
												?>
											</li>
											<li id="xd-data-email">
												<?php 
													$row["email"] == ''? $entry = '-': $entry = $row["email"]; 
													echo $entry;
												?>
											</li>
											<li id="xd-data-secEmail">
												<?php 
													$row["sec_email"] == ''? $entry = '-': $entry = $row["sec_email"]; 
													echo $entry;
												?>
											</li>
											<li id="xd-data-leadType">
												<?php 
													$row["lead_type"] == ''? $entry = '-': $entry = $row["lead_type"]; 
													echo $entry;
												?>
											</li>
											<li id="xd-data-source">
												<?php 
													$row["source"] == ''? $entry = '-': $entry = $row["source"]; 
													echo $entry;
												?>
											</li>
											<li id="xd-data-status">
												<?php 
													$row["status"] == ''? $entry = '-': $entry = $row["status"]; 
													echo $entry;
												?>
											</li>
											<li id="xd-data-owner">
												<?php 
													$row["owner"] == ''? $entry = '-': $entry = $row["owner"]; 
													echo $entry;
												?>
											</li>

										</ul>
									</div>									
								</div>
								<div class="xd-details-hover-body-separator"></div>
								<div class="xd-details-hover-foot">
									<a onclick="openinspace(this);" data-id ="<?php echo $row["id"];?>" data-name="<?php echo $row["name"];?>">Open in new Space</a>
								</div>
							</div>
						</td>
						<td><input disabled id="editEmail" class="xd-table-edit-inputs" value="<?php echo $row["email"]; ?>"></td>
						<td><input disabled id="editPhone" class="xd-table-edit-inputs" value="<?php echo $row["phone"]; ?>"></td>
						<td><input disabled id="editType" class="xd-table-edit-inputs" value="<?php echo $row["lead_type"]; ?>"></td>
						<td><input disabled id="editAddr" class="xd-table-edit-inputs" value="<?php echo $row["address"]; ?>"></td>
						<td class="xd-add-note-input-td">
							<input type="text" onkeypress="saveNote(event,this);" name="<?php echo 'addNote'.$row["id"]?>">
						</td>
						<td><?php echo $row["notes"]; ?></td>
						<td><input disabled id="editStatus" class="xd-table-edit-inputs" value="<?php echo $row["status"]; ?>"></td>	
						<td class="xd-color-td" style="background-color:<?php echo $row["color_tag"]; ?>;"></td>				
					</tr>
					<?php
						
						}
					}
					?>
					
				</table>
			<script>
				$(".xd-delete-btn").click(function(){
					var id = $(this).data('id');
					$(".xd-delete-btn[data-id='"+id+"']").parent().parent().parent().remove();
					$.get( "lib/php/data.php?delete="+id, function( data ) {
					});
				});
				$(".xd-color-options").click(function(){
					showColorPlate(this);
				});
				$(".xd-color-select").click(function(){
					var color = $(this).data("color");
					var id = $(this).data("id");
					$(this).parent().parent().parent().parent().find('.xd-color-td').css('background-color', '#'+color);
					$(this).parent().slideToggle();
					$.get( "lib/php/data.php?color="+color+'&id='+id, function( data ) {
					});
				});

				var ids = [];

				$('.xd-select-row').unbind().click();
				$('.xd-select-row').click(function(){
					var selected = $(this).data('selected');
					var id;
					var parent;
					if($('#xd-table-ajax').css('display') == 'block'){
						parent = $('#xd-table-ajax');
					}
					else{
						$('#space_non_home').find('.xd-non-home-data').each(function(i,obj){
							if($(this).css('display') == 'block'){
								parent = $(this);
							}
						});
					}
					if(!selected){
						$(this).prop('src','Assets/tick_on.png');
						$(parent).find('.xd-row-select-row').prop('src','Assets/tick_on.png');
						$(this).data('selected',true);
						$(parent).find('.xd-row-select-row').data('selected',true);
						ids = [];
						$(parent).find('.xd-row-select-row').each(function(i, obj) {
							id = $(this).data('id');
							ids.push(id);
						});
					}
					else{
						$(this).prop('src','Assets/tick.png');
						$(parent).find('.xd-row-select-row').prop('src','Assets/tick.png');
						$(this).data('selected',false);
						$(parent).find('.xd-row-select-row').data('selected',false);
						ids = [];
					}
				});
				$('.xd-row-select-row').unbind().click();
				$('.xd-row-select-row').click(function(){
					var parent;
					if($('#xd-table-ajax').css('display') == 'block'){
						parent = $('#xd-table-ajax');
					}
					else{
						$('#space_non_home').find('.xd-non-home-data').each(function(i,obj){
							if($(this).css('display') == 'block'){
								parent = $(this);
							}
						});
					}
					var selected = $(parent).find(this).data('selected');
					if(!selected){
						$(this).prop('src','Assets/tick_on.png');
						$(this).data('selected',true);
						var id = $(this).data('id');
						ids.push(id);
					}
					else{
						$(this).prop('src','Assets/tick.png');
						$(this).data('selected',false);
						var id = $(this).data('id');
						var index = ids.indexOf(id);
						ids.splice(index,1);
					}
				});

				

				$('#bulkUpdatebtn').click(function(){
					var field = $('#bulkFieldSelect').prop('value');
					var value = $('#bulkValue').prop('value');
					if(field!='Field' && value !=''){
						$('#xd-data-loading').fadeIn();
						$.get('lib/php/data.php?update='+field+'&value='+value+'&id='+ids, function(){
							refreshData();
						});
					}
					$('.xd-filters-special-2').find('ul').hide();

				});

			$('.xd-edit-btn').click(function(){
				var parent =  $(this).parent().parent().parent();


				var name = parent.find('#editName').prop('value');			
				var email = parent.find('#xd-data-email').html();
				var phone = parent.find('#xd-data-phone').html();
				var fax = parent.find('#xd-data-fax').html();
				var gradYear = parent.find('#xd-data-gradYear').html();
				var gender = parent.find('#xd-data-gender').html();
				var leadType = parent.find('#xd-data-leadType').html();
				var addr = parent.find('#xd-data-addr').html();
				var state = parent.find('#xd-data-state').html();
				var city = parent.find('#xd-data-city').html();
				var country = parent.find('#xd-data-country').html();
				var zip = parent.find('#xd-data-zip').html();
				var secEmail = parent.find('#xd-data-secEmail').html();
				var status = parent.find('#xd-data-status').html();
				var source = parent.find('#xd-data-source').html();
				var owner = parent.find('#xd-data-owner').html();


				var firstName = name.split(" ")[0];
				var lastName = name.split(" ")[1];
				email = email.trim();
				phone = phone.trim();
				fax = fax.trim();
				gradYear = gradYear.trim();
				gender = gender.trim();
				leadType = leadType.trim();
				addr = addr.trim();
				state = state.trim();
				city = city.trim();
				country = country.trim();
				zip = zip.trim();
				secEmail = secEmail.trim();
				status = status.trim();
				source = source.trim();
				owner = owner.trim();

				$('.xd-floating-add-btn').trigger('click');
				$('#addFirstName').prop('value',firstName);
				$('#addLastName').prop('value',lastName);
				$('#addEmail').prop('value',email);
				$('#addPhone').prop('value',phone);
				$('#addFax').prop('value',fax);
				$('#addGradYear').prop('value',gradYear);
				$('#addAddress').prop('value',addr);
				$('#addState').prop('value',state);
				$('#addCity').prop('value',city);
				$('#addCountry').prop('value',country);
				$('#addZip').prop('value',zip);
				$('#addLeadType').prop('value',leadType);
				$('#addSecEmail').prop('value',secEmail);

				$("#addGender[value='"+gender+"']").prop('checked',true);
				$("#addStatus[value='"+status+"']").prop('selected',true);
				$("#addSource[value='"+source+"']").prop('selected',true);
				$("#addOwner[value='"+owner+"']").prop('selected',true);

				$('#editForm').prop('value', $(this).data('id'));

				
			});

				

			</script>