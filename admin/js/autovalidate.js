<script type = "text/javascript" src="jquery.js"></script>
<script type = "text/javascript">
$(document).ready(function (){
	$('#feedback').load('add_account_validation.php').show();

	$('#physician_number_input').keyup(function (){
		$.post('add_account_validation.php', {physician_number : form.physician_number.value}, function(result){
			$('#feedback').html(result).show();
		});
	});
});
</script>

