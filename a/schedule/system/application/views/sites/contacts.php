<?PHP if (!$contacts) { return; } ?>

<div class="Suppress">

	<h1 class="ModuleHeader">Contacts</h1>
	<table id="ContactListing" class="Modules">
	<tr>
	<th>Name</th>
	<th>ITV Role</th>
	<th>Email</th>
	<th>Phone</th>
	</tr>
	
		<?PHP foreach ($contacts as $c) { ?>
		<tr>
		<td><a href="contacts/detail/<?=htmlentities($c['contactID'])?>"><?=htmlentities($c['contactFirstName'])?> <?=htmlentities($c['contactLastName'])?></a></td>
		<td><?=htmlentities($c['contactItvRole'])?></td>
		<td><?=(($c['contactEmail'] != '') ? '<a href="mailto:'.htmlentities($c['contactEmail']).'">'.htmlentities($c['contactEmail']).'</a>' : '')?></td>
		<td><?=htmlentities($c['contactPhone'])?></td>
		</tr>
		<?PHP } ?>

	</table>
</div>