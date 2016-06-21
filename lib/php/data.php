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
								<img onclick="editRow(this)" src="Assets/edit.png">
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
					$(this).parent().parent().parent().hide();
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
					$.get( "lib/php/data.php?color="+color+'&id='+id, function( data ) {
					});
				});
				$('td').click(function(){
					var input = $(this).find(".xd-table-edit-inputs");
					$('.xd-editable').removeClass('xd-editable').prop('disabled', true);
					$(input).addClass('xd-editable').prop('disabled', false).focus();
				});

				var ids = [];

				$('.xd-select-row').click(function(){
					var selected = $(this).data('selected');
					var id;
					if(!selected){
						$(this).prop('src','Assets/tick_on.png');
						$('.xd-row-select-row').prop('src','Assets/tick_on.png');
						$(this).data('selected',true);
						$('.xd-row-select-row').data('selected',true);
						
						ids = [];
						$('.xd-row-select-row').each(function(i, obj) {
							id = $(this).data('id');
							ids.push(id);
						});
					}
					else{
						$(this).prop('src','Assets/tick.png');
						$('.xd-row-select-row').prop('src','Assets/tick.png');
						$(this).data('selected',false);
						$('.xd-row-select-row').data('selected',false);
						ids = [];
					}
				});
				$('.xd-row-select-row').click(function(){
					var selected = $(this).data('selected');
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
						$("#xd-table-ajax").load('lib/php/data.php?update='+field+'&value='+value+'&id='+ids, function(){
							$('#xd-data-loading').fadeOut();
						});
					}
					$('.xd-filters-special-2').find('ul').hide();

				});

				

			</script>