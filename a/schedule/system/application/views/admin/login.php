<h1 class="ModuleHeader">NEAT Login</h1>


<?= form_open('admin/login'); ?>
<table id="Login" class="Modules">
	<tr>
		<td style="width: 100px;">Username:</td>
		<td><?= form_input('username') ?></td>
	</tr>

	<tr>
		<td>Password:</td>
		<td><?= form_password('password') ?></td>
	</tr>

	<tr>
		<td></td>
		<td><?= form_submit('submit', 'Log In!'); ?></td>
	</tr>

</table>
<?= form_close(); ?>