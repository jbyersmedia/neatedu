<?PHP if (!$contact) { return; } ?>

<h1 class="ModuleHeader">Contact: <?=htmlentities($contact['contactFirstName'])?> <?=htmlentities($contact['contactLastName'])?></h1>
<table id="ContactDetail" class="Modules">
<tr>
	<th>Site</th>
	<td><a href="sites/detail/<?=htmlentities($contact['siteID'])?>"><?=htmlentities($contact['siteName'])?></a></td>
</tr>
<tr>
	<th>ITV Role</th>
	<td><?=htmlentities($contact['contactItvRole'])?></td>
</tr>
<tr>
	<th>Email</th>
	<td><?=(($contact['contactEmail'] != '') ? '<a href="mailto:'.htmlentities($contact['contactEmail']).'">'.htmlentities($contact['contactEmail']).'</a>' : '')?></td>
</tr>
<tr>
	<th>Phone</th>
	<td><?=htmlentities($contact['contactPhone'])?></td>
</tr>
<tr>
	<th>Fax</th>
	<td><?=htmlentities($contact['contactFax'])?></td>
</tr>
<tr>
	<th>Mobile</th>
	<td><?=htmlentities($contact['contactMobile'])?></td>
</tr>
</table>