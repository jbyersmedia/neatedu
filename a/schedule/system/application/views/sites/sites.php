<?PHP if (!$sites) { return; } ?>

<h1 class="ModuleHeader">ITV Sites</h1>

<table id="SiteListing" class="Modules">
<tr>
<th>Site</th>
<th>City</th>
<th>State</th>
<th>Rooms</th>
</tr>

	<?PHP foreach ($sites as $s) { ?>
	<tr>
	<td><a href="sites/detail/<?=htmlentities($s['siteID'])?>"><?=htmlentities($s['siteName'])?></a></td>
	<td><?=htmlentities($s['siteCity'])?></td>
	<td><?=htmlentities($s['siteState'])?></td>
	<td><?=htmlentities($s['roomCount'])?></td>
	</tr>
	<?PHP } ?>

</table>