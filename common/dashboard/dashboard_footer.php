
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>

    	 $('#searchBar').keypress(function(event){
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
				if(validate('search')!=false){
					var query = $(this).prop('value');
					$("#xd-table-ajax").load("lib/php/data.php?q="+query);
				}
								
			}
		});

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
		        }
		    });

		    $("#xd-table-ajax").load("lib/php/data.php");
		});

		$(".xd-filters-link").click(function(){
			var filter = $(this).data('filter');
			$(".xd-filters-active-link").removeClass('xd-filters-active-link');
			$(this).parent().addClass('xd-filters-active-link');
			$("#xd-table-ajax").load("lib/php/data.php?filter="+filter);
		});

/*
		var $loading = $('#xd-table-ajax');
		$(document)
		  .ajaxStart(function () {
		    $loading.fadeOut();
		  })
		  .ajaxStop(function () {
		    $loading.fadeIn();
		 });
		 */

    </script>
</body>
</html>