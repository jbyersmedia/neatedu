<?PHP if (!$room) { return; } ?>

<h1 class="ModuleHeader">ITV Sites: <?=htmlentities($room['roomName'])?></h1>

<table id="RoomDetail" class="Modules">
<tr>
	<th>Site</th>
	<td><a href="sites/detail/<?=htmlentities($room['siteID'])?>"><?=htmlentities($room['siteName'])?></a></td>
</tr>
<tr>
	<th>Room&nbsp;Number</th>
	<td><?=htmlentities($room['roomName'])?></td>
</tr>
<tr>
	<th>Room&nbsp;Comment</th>
	<td><?=htmlentities($room['roomComment'])?></td>
</tr>
<tr>
	<th>Seating</th>
	<td><?=(($room['roomSeating'] > 0) ? htmlentities($room['roomSeating']) : '')?></td>
</tr>
<tr>
	<th>Room&nbsp;Phone</th>
	<td><?=htmlentities($room['roomPhone'])?></td>
</tr>
<tr>
	<th>Room&nbsp;Fax</th>
	<td><?=htmlentities($room['roomFax'])?></td>
</tr>
<tr>
	<th>VCR</th>
	<td><?=htmlentities($room['roomVCR'])?></td>
</tr>
<tr>
	<th>DVD</th>
	<td><?=htmlentities($room['roomDVD'])?></td>
</tr>
<tr>
	<th>Computer</th>
	<td><?=htmlentities($room['roomComputer'])?></td>
</tr>
<tr>
	<th>Internet&nbsp;Front</th>
	<td><?=htmlentities($room['roomInternetFront'])?></td>
</tr>
<tr>
	<th>Internet&nbsp;All</th>
	<td><?=htmlentities($room['roomInternetAll'])?></td>
</tr>
<tr>
	<th>Phone&nbsp;Add-On</th>
	<td><?=htmlentities($room['roomPhoneAddOn'])?></td>
</tr>
<tr>
	<th>Pad&nbsp;Camera</th>
	<td><?=htmlentities($room['roomPadCamera'])?></td>
</tr>
<tr>
	<th>Satellite</th>
	<td><?=htmlentities($room['roomSatellite'])?></td>
</tr>
<tr>
	<th>VC&nbsp;Wizard&nbsp;ID</th>
	<td><?=htmlentities($room['roomVCWizzardID'])?></td>
</tr>
<tr>
	<th>E164#</th>
	<td><?=htmlentities($room['roomE164'])?></td>
</tr>

<tr>
	<th valign="top">Notes</th>
	<td><?=$room['roomNotes']?></td>
</tr>
</table>