<?PHP if (!$sites) { return; } ?>

<div align="center">
<form name="Chooser" id="Chooser" action="javascript:sitechooser(this.form)" method="GET" >
<input type="hidden" name="route" value="sites/detail/" />
<select name="site">
<option value="">Choose a Site</option>
<option value="">-----------------</option>

	<?PHP foreach ($sites as $s) { ?>
	<option value="<?=htmlentities($s['siteID'])?>"><?=htmlentities($s['siteName'])?></option>
	<?PHP } ?>

</select>
<input type="submit" name="go" value="GO!" />
</form>

</div>