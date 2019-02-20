<?PHP if (!$site) { return; } ?>

<h1 class="ModuleHeader">ITV Sites: <?=htmlentities($site['siteName'])?></h1>

<table id="SiteDetail" class="Modules">
<tr>
<th>City</th>
<th>State</th>
<th>Schedule</th>
<th>Website</th>
</tr>
<tr>
<td><?=htmlentities($site['siteCity'])?></td>
<td><?=htmlentities($site['siteState'])?></td>
<td><a href="schedule/detail/<?=htmlentities($site['siteID'])?>">Click for Schedule Information</a></td>
<td><?=($site['siteURL'] != '' ? '<a href="'.htmlentities($site['siteURL']).'" target="_new">Click for Site Website</a>' : '')?></td>
</tr>
</table>