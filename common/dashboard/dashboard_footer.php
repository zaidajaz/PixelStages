
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
	<script src = "js/jquery1_11_3.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    <scirpt src="bootstrap/js/bootstrap.min.js"></scirpt>

    <script>

    	 $('#searchBar').keypress(function(event){
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
				if(validate('search')!=false){
					var query = $(this).prop('value');

					if($('#xd-table-ajax').css('display') == 'block'){
					$("#xd-table-ajax").load("lib/php/data.php?q="+query);
						var settingobj = new Object();
						settingobj.url = "lib/php/data.php?q="+query;
						settingobj.filter = $.parseJSON(homeSettings).filter;
						homeSettings = JSON.stringify(settingobj);
					}
					else{
						$('#space_non_home').find('.xd-non-home-data').each(function(i,obj){
							if($(this).css('display') == 'block'){
								$(this).load("lib/php/data.php?q="+query);
								var index = $(this).prop('id');
								var settingobj = new Object();
								settingobj.id = index;
								settingobj.url = "lib/php/data.php?q="+query;
								settingobj.filter = $.parseJSON(homeSettings).filter;
								settings[index] = JSON.stringify(settingobj);
							}
						});
					}
				}				
			}
		});
    	function clearForm(){
			$('#addFirstName').prop('value','');
			$('#addLastName').prop('value','');
			$('#addEmail').prop('value','');
			$('#addPhone').prop('value','');
			$('#addFax').prop('value','');
			$('#addGradYear').prop('value','');
			$('#addAddress').prop('value','');
			$('#addState').prop('value','');
			$('#addCity').prop('value','');
			$('#addCountry').prop('value','');
			$('#addZip').prop('value','');
			$('#addLeadType').prop('value','');
			$('#addSecEmail').prop('value','');

			$("#addGender[value='"+gender+"']").prop('checked',true);
			$("#addStatus[value='"+status+"']").prop('selected',true);
			$("#addSource[value='"+source+"']").prop('selected',true);
			$("#addOwner[value='"+owner+"']").prop('selected',true);
    	}
    	$(document).ready(function()
		{
		    $('body').mouseup(function(e)
		    {
		        var subject = $("#xd-add-hover-card"); 

		        if(e.target.id != subject.prop('id') && !subject.has(e.target).length && e.target.id!='xd-add-form-submit')
		        {
		            subject.hide();
		            $('.xd-add-form-submit').hide();
		            $('.xd-floating-add-btn').show();
		           	var editValue = $('#editForm').prop('value');
		           	if(editValue!=-1){
		           		$('#editForm').prop('value',-1);
		           		clearForm();
		           	}
		        }

		        subject = $(".xd-filters-special-1").find('ul'); 

		        if(e.target.id != subject.prop('id') && !subject.has(e.target).length)
		        {
		            subject.hide();
		        }
		        subject = $(".xd-filters-special-2").find('ul'); 

		        if(e.target.id != subject.prop('id') && !subject.has(e.target).length)
		        {
		            subject.hide();
		       
		        }
		    });

		    $("#xd-table-ajax").load("lib/php/data.php");
		});

		$(".xd-filters-link").click(function(){
			var filter = $(this).data('filter');
			$(".xd-filters-active-link").removeClass('xd-filters-active-link');
			$(this).parent().addClass('xd-filters-active-link');
			if($('#xd-table-ajax').css('display') == 'block'){
				$("#xd-table-ajax").load("lib/php/data.php?filter="+filter);
					var settingobj = new Object();
					settingobj.url = "lib/php/data.php?filter="+filter;
					settingobj.filter = filter;
					homeSettings = JSON.stringify(settingobj);
			}
			else{
				$('#space_non_home').find('.xd-non-home-data').each(function(i,obj){
					if($(this).css('display') == 'block'){
						$(this).load("lib/php/data.php?filter="+filter);
						var index = $(this).prop('id');
						var settingobj = new Object();
						settingobj.id = index;
						settingobj.url = "lib/php/data.php?filter="+filter;
						settingobj.filter = filter;
						settings[index] = JSON.stringify(settingobj);
						//alert(settings);
					}
				});
			}		
		});

		$('.xd-filters-special-1').click(function(){
			$(this).find('ul').slideToggle();
		});
		
		$('.xd-filters-special-2').click(function(e){
			if(e.target.id != 'bulkFieldSelect' && e.target.id != 'bulkValue' && e.target.id != 'bulkUpdatebtn'){
				$(this).find('ul').toggle();
			}
		});

		var spaceCount = 0;
		var settings = [];

		var homesetObj = new Object();
		homesetObj.url = "lib/php/data.php";
		homesetObj.filter = "all";
		var homeSettings = JSON.stringify(homesetObj);

		function openinspace(input){
			$('.xd-space-active').removeClass('xd-space-active').addClass('xd-space-inactive');
			$( "<div class='xd-space-active xd-space' data-id='"+spaceCount+"'><i class='fa fa-times' id='closeBtn'></i><p>New Space</p></div>").insertBefore( ".xd-add-space" );
			$('.xd-space-active').find('p').html($(input).data('name'));

			$('.xd-space-inactive, .xd-space-active').unbind().click();
			$('.xd-space-inactive, .xd-space-active').click(function(e){
				if(e.target.id != 'closeBtn'){
					spaceChangeEvent(this);
				}
			});

			$("#xd-table-ajax").hide();
			$('#space_non_home').find('.xd-non-home-data').hide();
			$('#space_non_home').append("<div class='xd-non-home-data' id="+spaceCount+"></div>").find('#'+spaceCount).load("details.php?id="+$(input).data('id'));
			$('.xd-filters-row').hide();

			var settingsobj = new Object();
			settingsobj.id = spaceCount;
			settingsobj.url = "details.php?id="+$(input).data('id');
			settingsobj.filter = "none";
			settings[spaceCount] = (JSON.stringify(settingsobj));
			//alert(settings);

			spaceCount++;

			$('.fa-times').unbind().click();
			$('.fa-times').click(function(e){
				closeEvent(this);
			});
			$('.xd-space-active').trigger('click');
		}

		function closeEvent(closeBtn){
			var inactiveSpaces = $('.xd-space-inactive');
				var max = inactiveSpaces.length - 1;
				var currentIndex = $(closeBtn).parent().data("id");
				$(closeBtn).parent().remove();
				//alert(currentIndex);
				var obj = $.parseJSON(settings[currentIndex]);
				settings[currentIndex] = -1;
				$('.xd-space-inactive').each(function(i, obj){
					if(i==max){
						$(obj).addClass('xd-space-active').removeClass('xd-space-inactive');
						if(spaceCount>0)
							spaceCount--;
					}
				});
				if(obj.filter == 'none'){
					$('#space_content').slideUp();
					var nowActive = $('.xd-space-active').data('id');
					if(nowActive==null){
						$('.xd-filters-row').show();
					}
					else{
						obj = $.parseJSON(settings[nowActive]);
						if(obj.filter!='none')
							$('.xd-filters-row').show();
					}
				}
					$('#space_non_home').find('#'+currentIndex).remove();
					var id = $('.xd-space-active').data('id');
					if(id!=null)
						$('#space_non_home').find('#'+id).show();
					else
						$('#xd-table-ajax').show();
		}

		function spaceChangeEvent(spaceInput){
			$('.xd-space-active').removeClass('xd-space-active').addClass('xd-space-inactive');
			$(spaceInput).removeClass('xd-space-inactive').addClass('xd-space-active');
			var id = $(spaceInput).data('id');

			if(id!=null){
				$('#space_non_home').show();
				$('#space_non_home').find('.xd-non-home-data').hide();
				$('#xd-table-ajax').hide();
				var obj = $.parseJSON(settings[id]);
				if(obj.filter == 'none'){
					$('.xd-filters-row').hide();
					$('#space_non_home').find('#'+id).show().find('div').show();
				}
				else{
					$('.xd-filters-row').show();
					$('#space_non_home').find('#'+id).show();
					$('#space_non_home').find('#'+id).find('.xd-non-home-data').show()
				}
				//alert(obj.filter);
				$('.xd-filters-link').each(function(i, object){
					if(obj.filter == $(this).data('filter')){
						$('.xd-filters-active-link').removeClass('xd-filters-active-link');
						$(this).parent().addClass('xd-filters-active-link');
						return false;
					}
				});
			}
			else{
				$('#space_non_home').hide();
				$('#xd-table-ajax').show();
				var obj = $.parseJSON(homeSettings);
				if(obj.filter =='all') obj.filter='';
				$('.xd-filters-link').each(function(i, object){
					if(obj.filter == $(this).data('filter')){
						$('.xd-filters-active-link').removeClass('xd-filters-active-link');
						$(this).parent().addClass('xd-filters-active-link');
						return false;
					}
				});
			}
			clearBulkSelects();
		}

		$('.xd-add-space').click(function(){
			var previousActive = $('.xd-space-active').data('id');
			$('.xd-space-active').removeClass('xd-space-active').addClass('xd-space-inactive');
			$( "<div class='xd-space-active' data-id='"+spaceCount+"'><i class='fa fa-times' id='closeBtn'></i><p>New Space</p></div>").insertBefore( ".xd-add-space" );
			$('.xd-space-active').find('p').dblclick(function(){
				$(this).prop('contentEditable',true);
			}).blur(function(){
				$(this).prop('contentEditable',false);
			});

			$('.xd-filters-active-link').removeClass('xd-filters-active-link');
			$('.xd-filters-link').first().parent().addClass('xd-filters-active-link');

			$('.xd-space-inactive, .xd-space-active').unbind().click();
			$('.xd-space-inactive, .xd-space-active').click(function(e){
				if(e.target.id != 'closeBtn'){
					spaceChangeEvent(this);
				}
			});

			$("#xd-table-ajax").hide();
			$('#space_non_home').find('.xd-non-home-data').hide();

			$('#space_non_home').append("<div class='xd-non-home-data' id="+spaceCount+"></div>").find('#'+spaceCount).load("lib/php/data.php");

			var settingsobj = new Object();
			settingsobj.id = spaceCount;
			settingsobj.url = "lib/php/data.php";
			settingsobj.filter = "all";
			settings[spaceCount] = (JSON.stringify(settingsobj));
			//alert(settings);

			spaceCount++;

			$('.fa-times').unbind().click();
			$('.fa-times').click(function(e){
				closeEvent(this);
			});
			
			if(previousActive!=null){
				settingsobj = $.parseJSON(settings[previousActive]);
				if(settingsobj.filter == 'none') $('.xd-filters-row').show();
			}
			$('.xd-space-active').trigger('click');

			clearBulkSelects();
		});
		function clearBulkSelects(){
			ids = [];
			$('.xd-select-row').data('selected',false);
			$('.xd-row-select-row').data('selected',false);
			$('.xd-select-row').prop('src','Assets/tick.png');
			$('.xd-row-select-row').prop('src','Assets/tick.png');
		}
		$(function() {
     		$("input:file").change(function (){
		     var fileName = $(this).val();
		     fileName = fileName.split(/(\\|\/)/g).pop();
		     var fieldName = $(this).data('field');
		     $('#'+fieldName).prop('value', fileName); 
     		});
  		});

  		$("#addDetailsForm").submit(function(e) {
  			e.preventDefault();
		    var url = "dashboard.php";
		   	var valid = validate('addDetails');
		   	if(valid == null) valid = true;

		   	if(valid){
		   		$('.xd-add-hover-card').fadeOut();
		   		$('.xd-add-form-submit').hide();
		   		$('.xd-floating-add-btn').show();
		   		$('#xd-data-loading').fadeIn();
		    	 $.ajax({
		           type: "POST",
		           url: url,
		           data: $("#addDetailsForm").serialize(),
		           success: function(data)
		           {
		           		$('#xd-data-loading').fadeOut();
		           		refreshData();
		           }
		         });
		         $('#editForm').prop('value', -1);
		         clearForm();
		   	}
		});

		$("#advSearchForm").submit(function(e) {
  			e.preventDefault();
		    var url = "dashboard.php";
		   	var valid = validate('advSearch');
		   	if(valid == null) valid = true;

			   	if(valid){ 
			   		var query = $("#advSearchForm").serialize();

					if($('#xd-table-ajax').css('display') == 'block'){
						$("#xd-table-ajax").load("lib/php/data.php?adv_search=search&"+query);
						var settingobj = new Object();
						settingobj.url = "lib/php/data.php?adv_search=search&"+query;
						settingobj.filter = $.parseJSON(homeSettings).filter;
						homeSettings = JSON.stringify(settingobj);
					}
					else{
						$('#space_non_home').find('.xd-non-home-data').each(function(i,obj){
							if($(this).css('display') == 'block'){
								$(this).load("lib/php/data.php?adv_search=search&"+query);
								var index = $(this).prop('id');
								var settingobj = new Object();
								settingobj.id = index;
								settingobj.url = "lib/php/data.php?adv_search=search&"+query;
								settingobj.filter = $.parseJSON(homeSettings).filter;
								settings[index] = JSON.stringify(settingobj);
							}
						});
					}
			   	}  		
		   		
			});
		
		/*
		var $loading = $('#xd-data-loading');
		$loading.hide();
		$(document)
		  .ajaxStart(function () {
		    $loading.fadeIn();
		  })
		  .ajaxStop(function () {
		    $loading.fadeOut();
		 });
		 */

		function refreshData(){
			var obj = $.parseJSON(homeSettings);
			var homeUrl = obj.url;
			$('#xd-table-ajax').load(homeUrl, function(){
				$('.xd-space-active').trigger('click');
				$('#xd-data-loading').fadeOut();
			});

			for(i=0;i<=settings.length-1;i++){
				var obj = $.parseJSON(settings[i]);
				$('#space_non_home').find('#'+obj.id).load(obj.url,function(){
					$('.xd-space-active').trigger('click');
					$('#xd-data-loading').fadeOut();
				});
			}
		 }

    </script>
</body>
</html>