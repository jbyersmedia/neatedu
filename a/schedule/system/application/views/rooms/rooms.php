<?PHP if (!$rooms) { return; } ?>

<h1 class="ModuleHeader">Room List</h1>
<table id="RoomListing" class="Modules">



	<?PHP foreach ($rooms as $r) { ?>

		<?PHP if ($r['siteName'] != $lastsite) { $lastsite = $r['siteName']; ?>
		<tr class="header"><th colspan="3"><a href="sites/detail/<?=htmlentities($r['siteID'])?>"><?=htmlentities($r['siteName'])?></a></th></tr>
		<tr class="subheader">
		<td>Room&nbsp;Number</td>
		<td>Seating</td>
		<td>Room&nbsp;Phone</td>
		</tr>
		<?PHP } ?>

	<tr>
	<td><a href="rooms/detail/<?=htmlentities($r['roomID'])?>"><?=htmlentities($r['roomName'])?></a></td>
	<td><?=(($r['roomSeating'] > 0) ? htmlentities($r['roomSeating']) : '')?></td>
	<td><?=htmlentities($r['roomPhone'])?></td>
	</tr>
	<?PHP } ?>

</table>
