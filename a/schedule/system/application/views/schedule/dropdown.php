<?PHP if (!$sites) { return; } ?>

<div>
<p><a href="newevent/">Schedule an ITV Class or Event</a></p>

<p>or,</p>

<p>To View Your Site's Schedule, select your site from the list below.</p>
<form name="Chooser" id="Chooser" action="javascript:sitechooser(this.form)" method="POST" >
<input type="hidden" name="route" value="schedule/detail/" />
<select name="site">
<option value="">Choose a Site</option>
<option value="">-----------------</option>
<option value="two-day" <?=(($id == 'two-day') ? 'selected="selected"' : '')?> >All sites Schedule for two days</option>
<option value="">-----------------</option>

	<?PHP foreach ($sites as $s) { ?>
	<option value="<?=htmlentities($s['siteID'])?>" <?=(($id == $s['siteID']) ? 'selected="selected"' : '')?>><?=htmlentities($s['siteName'])?></option>
	<?PHP } ?>

</select>
<input type="submit" name="go" value="GO!" />
</form>
</div>