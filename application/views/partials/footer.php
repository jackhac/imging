<div class="container">
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
<script>
	$('#popoverData1').popover();
	$('#popoverData2').popover();
	$('#popoverData3').popover();
	$('#myModal').on('shown.bs.modal', function () 
	{
		$('#myInput').focus()
	});
</script>


</body>
</html>