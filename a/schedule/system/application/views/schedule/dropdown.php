<?PHP if (!$sites) { return; } ?>

<div>
<p><a href="newevent/">Schedule an ITV Class or Event</a></p>

<p>or,</p>

<p>To View Your Site's Schedule, select your site from the list below.<a href="<?php echo base_url(); ?>schedule"><button type="button" >Reset</button></a></p>
<form name="Chooser" id="Chooser" action="javascript:sitechooser(this.form)" method="POST" >
<input type="hidden" name="route" value="schedule/detail/" />

<select name="region" id="region">
<option value="">Choose a Region</option>
	<?PHP
	
 	if(isset($regionid[0]['regionID'])!=''){
		 $regid = $regionid[0]['regionID'];	
	}else if(isset($regionid)!=''){
		 $regid = $regionid;
	}else{
		$regid='';
	}

	foreach ($regions as $s) { ?>
	<option value="<?=htmlentities($s['regionID'])?>" <?=((  $regid == $s['regionID']) ? 'selected="selected"' : '')?>><?=htmlentities($s['regionCode'])?></option>
	<?PHP } ?>

</select>

<select name="site" id="sites">
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