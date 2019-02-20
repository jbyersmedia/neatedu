<?PHP if (!$rooms) { return; } ?>

<div class="Suppress">

	<h1 class="ModuleHeader">Room List</h1>
	<table id="RoomListing" class="Modules">
	<tr>
	<th>Room Number</th>
	<th>Seating</th>
	<th>Room Phone</th>
	</tr>

		<?PHP foreach ($rooms as $r) { ?>	
		<tr>
		<td><a href="rooms/detail/<?=htmlentities($r['roomID'])?>"><?=htmlentities($r['roomName'])?></a></td>
		<td><?=(($r['roomSeating'] > 0) ? htmlentities($r['roomSeating']) : '')?></td>
		<td><?=htmlentities($r['roomPhone'])?></td>
		</tr>
		<?PHP } ?>

	</table>
</div>