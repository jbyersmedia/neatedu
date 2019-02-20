<?PHP if (!$contacts) { return; } ?>

<h1 class="ModuleHeader">Contacts</h1>

<table id="ContactListing" class="Modules">

	<?PHP foreach ($contacts as $c) { ?>
		<?PHP if ($c['siteName'] != $lastsite) { $lastsite = $c['siteName']; ?>
		<tr class="header"><th colspan="4"><a href="sites/detail/<?=htmlentities($c['siteID'])?>"><?=htmlentities($c['siteName'])?></a></th></tr>
		<tr class="subheader">
		<td>Name</td>
		<td>ITV Role</td>
		<td>Phone</td>
		</tr>
		<?PHP } ?>
	<tr>
	<td><a href="contacts/detail/<?=htmlentities($c['contactID'])?>"><?=htmlentities($c['contactFirstName'])?> <?=htmlentities($c['contactLastName'])?></a></td>
	<td><?=htmlentities($c['contactItvRole'])?></td>
	<td><?=htmlentities($c['contactPhone'])?></td>
	</tr>
	<?PHP } ?>

</table>
