<h1 class="ModuleHeader">ITV Administration</h1>

<div style="text-align: right; margin: 0px 0px 10px 0px"><a href="admin/logout">Log Out</a></div>

<?PHP if ($this->session->flashdata('message'))  { ?>
	<div class="Message"><?= $this->session->flashdata('message') ?></div>
<?PHP } ?>


<?PHP if (!$validated)  { ?>

	<table id="Administration" class="Modules">
	<tr>
	<td>
	<p>The Events files are unavailable or improperly formatted.  Please re-upload them and <a href="admin">click here</a> to refresh the page.</p>
	<p>Reason: <?= $msg ?></p>
	</td>
	</tr>
	</table>

<?PHP } else { ?>

	<div class="Modules">
	<?= form_open('admin/update') ?>
	<?= form_submit('submit', 'Update Events!') ?>
	<?= form_close() ?>
	</div>

<?PHP } ?>