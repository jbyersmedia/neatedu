<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	$host=$_SERVER['HTTP_HOST'];
	if($host=="www.neatedu.net") {
	?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135349865-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-135349865-1');
		</script>
	<?php 
	}
	?>

	<base href="<?=base_url()?>" />

	<title><?=($title != '' ? $title.' - ' : '')?>NorthEast Alliance for Telecommunications</title>

	<link type="text/css" href="css/css.css" rel="stylesheet" />
	<script type="text/javascript" src="js/sitechooser.js"></script>
	<script type="text/javascript" src="js/imgswap.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).ready(function (){
	
	$('#region').change(function(){
		//console.log("works");
		var region_id = $('#region').val();
		var selectedRegion = $(this).children("option:selected").val();
		var id = "<?php echo $id ?>";	
		 if(region_id != ''){
			$.ajax({
				url:"<?php echo base_url(); ?>schedule/fetch_sites/"+region_id,
				method:"POST",
                dataType: "json",
				//data:{region_id:region_id},
                    success:function(data) {
                        $('select[name="site"]').empty();
						$('select[name="site"]').append('<option value=""> Choose a Site </option>');
						$('select[name="site"]').append('<option value="">-----------------</option>');
						if(id=='two-day'){
							$('select[name="site"]').append('<option value="two-day" selected >All sites Schedule for two days</option>');
						}else{
							$('select[name="site"]').append('<option value="two-day" >All sites Schedule for two days</option>');
						}
						$('select[name="site"]').append('<option value="">-----------------</option>');
                        $.each(data, function(key, value) {
							if(value.siteID!=''){
								if(id==value.siteID){
									$('select[name="site"]').append('<option selected value="'+ value.siteID +'">'+ value.siteName +'</option>');
								}else{
									$('select[name="site"]').append('<option value="'+ value.siteID +'">'+ value.siteName +'</option>');
								}
								
							}
                        });
                    } 
			});
		}else{
			 $.ajax({
				url:"<?php echo base_url(); ?>schedule/fetch_all",
				method:"POST",
                dataType: "json",
				//data:{region_id:region_id},
                    success:function(data) {
                        $('select[name="site"]').empty();
						$('select[name="site"]').append('<option value="" selected> Choose a Site </option>');
						$('select[name="site"]').append('<option value="">-----------------</option>');
						$('select[name="site"]').append('<option value="two-day">All sites Schedule for two days</option>');									
						$('select[name="site"]').append('<option value="">-----------------</option>');
                        $.each(data, function(key, value) {
							if(value.siteID!=''){
									$('select[name="site"]').append('<option value="'+ value.siteID +'">'+ value.siteName +'</option>');
							}
                        });
                    } 
			});
		}
	});
	
});

$(document).ready(function (){
	$('#region').trigger('change');
});
</script>

</head>
<body>

	<div id="Container">
	<table border="0" cellpadding="6" cellspacing="0" width="100%">
	<tr>
		<td id="Header" align="center" colspan="2">
		<img src="images/NEAT2.gif" width="300" height="100" alt="NEAT" /><br />
		Welcome to NorthEast Alliance for Telecommunications, Serving Northeast Minnesota<br />
		</td>
	</tr>
	<tr>
	<td id="LeftCol" valign="top">
		<div id="Nav">
		<a href="./">Home</a>
		<a href="schedule">Schedule</a>
		<a href="sites">ITV Sites</a>
		<a href="rooms">ITV Rooms</a>
		<a href="contacts">Contact Directory</a>
		<a href="aboutus">About Us</a>
		<a href="howto">How To's (FAQ's)</a>
		<a href="sites/detail/17">Contact Us</a>
		</div>
	</td>
	<td id="MidCol" valign="top">