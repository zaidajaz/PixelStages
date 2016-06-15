
function validate(validationType){
	switch (validationType){
		case 'login':
			var email = $('#loginemail').prop('value');
			var password = $('#loginpassword').prop('value');
			if (!email.match(/^([A-Z0-9 a-z@._-]{3,30}$)/i)) {
				$('#xd-info').html('Invalid characters in Email').fadeIn(1000);
				return false;
			}
			if (!password.match(/^([A-Z0-9 a-z!@#$%^&*(,)\/._-]{3,30}$)/i)) {
				$('#xd-info').html('Invalid characters in password').fadeIn(1000);
				return false;
			}
			break;
		case 'search':
			var searchinput = $("#searchBar").prop('value');
			if (!searchinput.match(/^([A-Z0-9 a-z.]{3,30}$)/i)) {
				alert('Invalid characters in search query');
				return false;
			}
			break;
		case 'advSearch':
			var fname = $('#advFirstName').prop('value');
			var lname = $('#advLastName').prop('value');
			var email = $('#advEmail').prop('value');
			var city = $('#advCity').prop('value');
			var state = $('#advState').prop('value');
			var stage = $('#advStage').prop('value');
			var owner = $('#advOwner').prop('value');
			var phone = $('#advPhone').prop('value');

			if(fname != ''){
				if (!fname.match(/^([A-Z0-9 a-z.]{3,30}$)/i)) {
					alert('Invalid characters in First Name');
					return false;
				}
			}
			if(lname!=''){
				if (!lname.match(/^([A-Z0-9 a-z.]{3,30}$)/i)) {
					alert('Invalid characters in Last Name');
					return false;
				}
			}
			if(email!=''){
				if (!email.match(/^([A-Z0-9 a-z@._-]{3,30}$)/i)) {
					$('#xd-info').html('Invalid characters in Email').fadeIn(1000);
					return false;
				}
			}
			if(phone!=''){
				if (!phone.match(/^([0-9]{3,30}$)/i)) {
					$('#xd-info').html('Invalid characters in Email').fadeIn(1000);
					return false;
				}
			}
			if(city!=''){
				if (!city.match(/^([A-Z0-9 a-z.]{3,30}$)/i)) {
					alert('Invalid characters in First Name');
					return false;
				}
			}
			if(state!=''){
				if (!state.match(/^([A-Z0-9 a-z.]{3,30}$)/i)) {
					alert('Invalid characters in First Name');
					return false;
				}
			}
			if(stage!=''){
				if (!stage.match(/^([A-Z0-9 a-z.]{3,30}$)/i)) {
					alert('Invalid characters in First Name');
					return false;
				}
			}
			if(owner!=''){
				if (!owner.match(/^([A-Z0-9 a-z.]{3,30}$)/i)) {
					alert('Invalid characters in First Name');
					return false;
				}
			}
			break;
		case 'addDetails':

			var fname = $('#addFirstName').prop('value');
			var lname = $('#addLastName').prop('value');
			var email = $('#addEmail').prop('value');
			var phone = $('#addPhone').prop('value');
			var fax = $('#addFax').prop('value');
			var grad_year = $('#addGradYear').prop('value');
			var addr = $('#addAddress').prop('value');
			var city = $('#addCity').prop('value');
			var state = $('#addState').prop('value');
			var status = $('#addStatus').prop('value');
			var owner = $('#addOwner').prop('value');
			var source = $('#addSource').prop('value');
			alert(fname + lname + email + phone + fax + grad_year + addr + city + state + owner + source);
			if(fname != ''){
				if (!fname.match(/^([A-Z0-9 a-z.]{3,30}$)/i)) {
					alert('Invalid characters in First Name');
					return false;
				}
			}
			if(lname!=''){
				if (!lname.match(/^([A-Z0-9 a-z.]{3,30}$)/i)) {
					alert('Invalid characters in Last Name');
					return false;
				}
			}
			if(email!=''){
				if (!email.match(/^([A-Z0-9 a-z@._-]{3,30}$)/i)) {
					alert('Invalid characters in Email');
					return false;
				}
			}
			if(phone!=''){
				if (!phone.match(/^([0-9]{10,14}$)/i)) {
					alert('Invalid characters in Phone');
					return false;
				}
			}
			if(fax!=''){
				if (!fax.match(/^([0-9]{10,14}$)/i)) {
					alert('Invalid characters in Fax');
					return false;
				}
			}
			if(grad_year!=''){
				if (!grad_year.match(/^([0-9]{4,4}$)/i)) {
					alert('Invalid characters in Graduation Year');
					return false;
				}
			}
			if(addr!=''){
				if (!addr.match(/^([A-Z0-9 a-z,/.]{3,30}$)/i)) {
					alert('Invalid characters in Address');
					return false;
				}
			}
			if(city!=''){
				if (!city.match(/^([A-Z0-9 a-z.]{3,30}$)/i)) {
					alert('Invalid characters in First Name');
					return false;
				}
			}
			if(state!=''){
				if (!state.match(/^([A-Z0-9 a-z.]{3,30}$)/i)) {
					alert('Invalid characters in First Name');
					return false;
				}
			}
			if(status!=''){
				if (!stage.match(/^([A-Z0-9 a-z.]{3,30}$)/i)) {
					alert('Invalid characters in First Name');
					return false;
				}
			}
			if(source!=''){
				if (!stage.match(/^([A-Z0-9 a-z.]{3,30}$)/i)) {
					alert('Invalid characters in First Name');
					return false;
				}
			}
			if(owner!=''){
				if (!owner.match(/^([A-Z0-9 a-z.]{3,30}$)/i)) {
					alert('Invalid characters in First Name');
					return false;
				}
			}
			break;
		default:
			break;
	}
}