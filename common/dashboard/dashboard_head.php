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
    <script src="https://use.fontawesome.com/6cab19a7e8.js"></script>
    <script type="text/javascript" src="js/valid.js"></script>

    <script type="text/javascript">

		function saveNote(event,input){
		    var keycode = (event.keyCode ? event.keyCode : event.which);
		    if(keycode=="13"){
		    	var note = $(input).prop('value');
		    	var id = $(input).prop('name');
		    	id = id.substring(7,id.length);
		    	if (!note.match(/^([A-Z0-9 a-z,/.]{3,30}$)/i)) {
					alert('Invalid characters in Note');
				}
				else{
					$(input).parent().next().html(note);
					$.get( "lib/php/data.php?note="+note+'&id='+id, function( data ) {
					});
					//window.location = "lib/php/data.php?note="+note+'&id='+id;
				}
		    }
		}

		function clearPlace(input){
			input.placeholder = "";
		}
		function fillPlace(input){
			input.placeholder = $(input).data('placeholder');
		}

		function openInSpace(srclink){
			$('.xd-space-active').removeClass('xd-space-active').addClass('xd-space-inactive');
			$( "<div class='xd-space-active'>New Space</div>").insertBefore( ".xd-add-space" );
		}

		function showColorPlate(input){
			$(input).parent().find('.xd-color-plate').slideToggle();
		}
		function CreateSpace(id,name){
			var jCode = "$('#space_content').show().load('details.php?id="+id+"');$('.xd-spaces-container').find('.xd-space-active').removeClass('xd-space-active').addClass('xd-space-inactive'); $(this).toggleClass('xd-space-inactive').toggleClass('xd-space-active');";
			
			var onclickcode ="onClick = " + "\""+jCode+"\"";

			$('.xd-space-active').removeClass('xd-space-active').addClass('xd-space-inactive');
			$( "<div "+onclickcode+" class='xd-space-active'><i class='fa fa-times' onclick='closeSpace(this);'></i>"+name+"</div>").insertBefore( ".xd-add-space" );
			$('#space_content').show().load('details.php?id='+id);
		}

		function closeSpace(input){
			$("#space_content").fadeOut();
			$(input).parent().hide();
		}

		function editRow(input){
			var isDisabled = $('.xd-edit-row').find('.xd-table-edit-inputs').prop('disabled');
			$('.xd-edit-row').find('.xd-table-edit-inputs').prop('disabled',!isDisabled);
			$('.xd-edit-row').find('.xd-table-edit-inputs').toggleClass('xd-editable');
			$('.xd-edit-row').find('.xd-edit-btn-save').toggle();
		}

		function saveEdit(input){
			var name = $('.xd-edit-row').find('#editName').prop('value');
			var email =$('.xd-edit-row').find('#editEmail').prop('value');	
			var phone =$('.xd-edit-row').find('#editPhone').prop('value');	
			var type =$('.xd-edit-row').find('#editType').prop('value');
			var addr =$('.xd-edit-row').find('#editAddr').prop('value');
			var status =$('.xd-edit-row').find('#editStatus').prop('value');

			var string = '?';

			if(name!=null){
				string += 'name='+name;
			}
			if(email!=null){
				if(string == '?') string += 'email='+email;
				else string += '&email='+email;
			}
			if(phone!=null){
				if(string == '?') string += 'phone='+phone;
				else string += '&phone='+phone;
			}
			if(type!=null){
				if(string == '?') string += 'type='+type;
				else string += '&type='+type;
			}
			if(addr!=null){
				if(string == '?') string += 'addr='+addr;
				else string += '&addr='+addr;
			}
			if(status!=null){
				if(string == '?') string += 'status='+status;
				else string += '&status='+status;
			}

			window.location = 'dashboard.php'+string;
		}

		
    </script>
</head>
<body>
	<nav class="xd-navbar">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
					<img src="Assets/pixelstages.png">
				</div>
				<div class="col-lg-8 col-md-8 hidden-sm hidden-xs">
					<ul class="xd-menu-list">
						<li class="xd-menu-active-link"><a href="#">Leads and Contacts</a></li>
						<li><a href="#">Statistics</a></li>
						<li><a href="#">Manage</a></li>
						<li><a href="#">Users</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-11 col-xs-11">
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
			<div class="col-lg-8 col-md-8 hidden-sm hidden-xs">

			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
					<input type="text" class="xd-search-bar" id="searchBar" name="q">
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
				<div class="xd-advanced-search">
					<img src="Assets/mustache.png" class="xd-advance-image-moustache">
					<small>Advanced Search</small>
					<img src="Assets/arrowdown.png" class="xd-arrow-down">
				</div>
				<div class="xd-advance-search-hover-card">
					<img src="Assets/hover-triangle.png" class="xd-advance-hover-triangle">
					<form action="" method="post" onsubmit="return validate('advSearch');">
						<div class="xd-advance-search-container">
							<div class="xd-advance-left-inputs">
								<input type="text" class="xd-advance-input" onfocus="this.placeholder='';" onblur="this.placeholder='First Name';" name="advFirstName" id="advFirstName" placeholder="First Name">
								<input type="email" onfocus="this.placeholder='';" onblur="this.placeholder='Email';" class="xd-advance-input" name="advEmail" id="advEmail" placeholder="Email">
								<input type="text" onfocus="this.placeholder='';" onblur="this.placeholder='City';" class="xd-advance-input" name="advCity" id="advCity" placeholder="City">
								<div class="xd-advance-input xd-advance-input-select">
									<select name="advStage" placeholder="Stage" id="advStage">
										<option>Stage 1</option>
										<option>Stage 2</option>
										<option>Stage 3</option>
									</select>									
								</div>

								<div class="xd-adv-seperator xd-adv-seperator-left"></div>
								<input type="submit" name="adv_search" value="Search" class="xd-advance-search-btn xd-adv-btn-left">
							</div>
							<div class="xd-advance-right-inputs">
								<input type="text" class="xd-advance-input" onfocus="this.placeholder='';" onblur="this.placeholder='Last Name';" name="advLastName" id="advLastName" placeholder="Last Name">
								<input type="tel" pattern="^\d{10,14}$" title="XXXXXXXXXX" maxlength="14" onfocus="this.placeholder='';" onblur="this.placeholder='Phone';" class="xd-advance-input" name="advPhone" placeholder="Phone">
								<input type="text" onfocus="this.placeholder='';" onblur="this.placeholder='State';" class="xd-advance-input" name="advState" id="advState" placeholder="State">
								<div class="xd-advance-input xd-advance-input-select">
									<select name="advOwner" placeholder="Owner" id="advOwner">
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
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="xd-spaces-container">
					<div id="homeSpace" onclick="$('#space_content').hide();$('.xd-spaces-container').find('.xd-space-active').removeClass('xd-space-active').addClass('xd-space-inactive'); $(this).toggleClass('xd-space-inactive').toggleClass('xd-space-active');" class="xd-space-active">
						Home
					</div>
					<div class="xd-add-space">
					 	<h1>+</h1>
					</div>
				</div>
			</div>
		</div>