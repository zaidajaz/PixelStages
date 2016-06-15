
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
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
		});
    </script>

</body>
</html>