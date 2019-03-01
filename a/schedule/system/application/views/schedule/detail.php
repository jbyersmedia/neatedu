<?PHP if (!$events) { ?>
	<h1 class="ModuleHeader">Schedule</h1>
	<table class="Modules">
	<tr><td>Sorry, but there are currently no schedules in our database for this location.</td></tr>
	</table>
<?PHP return; } ?>


<h1 class="ModuleHeader">Schedule</h1>

<table id="ScheduleListing" class="Modules">

	<?PHP foreach ($events as $e) { 
	
/*	echo "<pre>";
 	print_r($e);
	exit; */
	
	
	?>
	
		<?PHP if ($e['eventDate'] != $lastdate) { $lastdate = $e['eventDate']; ?>
		<tr class="header"><th colspan="5"><?=htmlentities($e['eventDate'])?></th></tr>
		<tr class="subheader">
		<td>Connect</td>
		<td>Start</td>
		<td>End</td>
		<td>Event</td>
		</tr>
		<?PHP } ?>

	<tr class="times">
	<td nowrap="nowrap"><strong><?=htmlentities($e['timeConnect'])?></strong></td>
	<td nowrap="nowrap"><strong><?=htmlentities($e['timeStart'])?></strong></td>
	<td nowrap="nowrap"><strong><?=htmlentities($e['timeEnd'])?></strong></td>
	<td><?=htmlentities($e['eventName'])?></td>
	</tr>
	
	<tr class="otherlocs">
	<td colspan="3" valign="top">Host: <?=htmlentities($e['eventHost'])?></td>
	<td colspan="1" valign="top"><strong>Sites with this Course/Meeting</strong><br /><br /><?=preg_replace('/[\n]+/', '<br />', $e['siteList'])?></td>
	</tr>

	<?PHP } ?>

</table>