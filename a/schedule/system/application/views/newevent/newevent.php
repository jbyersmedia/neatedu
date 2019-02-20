<h1 class="ModuleHeader">ITV Event Schedule Form</h1>

<?= form_open('newevent/create'); ?>
<table id="NewEvent" class="Modules">

		<tr>
		<td>YOUR NAME:</td>
		<td><?= form_input('name', set_value('name'), form_error('name')) ?></td>
		</tr>
	
		<tr>
		<td>YOUR EMAIL:</td>
		<td><?= form_input('email', set_value('email'), form_error('email')) ?></td>
		</tr>
	
		<tr>
		<td>COURSE/MEETING TITLE:</td>
		<td><?= form_input('coursetitle', set_value('coursetitle'), form_error('coursetitle')) ?></td>
		</tr>
	
		<tr>
		<td>COURSE#:</td>
		<td><?= form_input('coursenumber', set_value('coursenumber'), form_error('coursenumber')) ?></td>
		</tr>
	
		<tr>
		<td>INSTRUCTOR:</td>
		<td><?= form_input('instructor', set_value('instructor'), form_error('instructor')) ?></td>
		</tr>

	<tr><th colspan="2">EVENT DATES</th></tr>

		<tr>
		<td>DAYS:</td>
		<td>
			<?= form_checkbox('days[]', 'Sun', set_checkbox('days', 'Sun')) ?> <span <?= form_error('days') ?> >Sun</span>, 
			<?= form_checkbox('days[]', 'Mon', set_checkbox('days', 'Mon')) ?> <span <?= form_error('days') ?> >Mon</span>,
			<?= form_checkbox('days[]', 'Tue', set_checkbox('days', 'Tue')) ?> <span <?= form_error('days') ?> >Tue</span>,
			<?= form_checkbox('days[]', 'Wed', set_checkbox('days', 'Wed')) ?> <span <?= form_error('days') ?> >Wed</span>,
			<?= form_checkbox('days[]', 'Thu', set_checkbox('days', 'Thu')) ?> <span <?= form_error('days') ?> >Thu</span>,
			<?= form_checkbox('days[]', 'Fri', set_checkbox('days', 'Fri')) ?> <span <?= form_error('days') ?> >Fri</span>,
			<?= form_checkbox('days[]', 'Sat', set_checkbox('days', 'Sat')) ?> <span <?= form_error('days') ?> >Sat</span>
		</td>
		</tr>

		<tr>
		<td>START TIME:</td>
		<td>
			<?= form_input(array('name'=>'starttime', 'size'=>'7'), set_value('starttime'), form_error('starttime')) ?>
			<?= form_radio('startampm', 'AM', set_radio('startampm', 'AM', TRUE)) ?> <span <?= form_error('startampm') ?> >AM</span>
			<?= form_radio('startampm', 'PM', set_radio('startampm', 'PM')) ?> <span <?= form_error('startampm') ?> >PM</span>
		</td>
		</tr>

		<tr>
		<td>STOP TIME:</td>
		<td>
			<?= form_input(array('name'=>'stoptime', 'size'=>'7'), set_value('stoptime'), form_error('stoptime')) ?>
			<?= form_radio('stopampm', 'AM', set_radio('stopampm', 'AM', TRUE)) ?> <span <?= form_error('startampm') ?> >AM</span>
			<?= form_radio('stopampm', 'PM', set_radio('stopampm', 'PM')) ?> <span <?= form_error('startampm') ?> >PM</span>
		</td>
		</tr>

		<tr>
		<td>START / END DATES:</td>
		<td>
			<?= form_input(array('name'=>'startdate', 'size'=>'7'), set_value('startdate'), form_error('startdate')) ?> / 
			<?= form_input(array('name'=>'enddate', 'size'=>'7'), set_value('enddate'), form_error('enddate')) ?>
		</td>
		</tr>

		<tr>
		<td>INTERMEDIATE DATES:</td>
		<td><?= form_input('intermediatedates', set_value('intermediatedates'), form_error('intermediatedates')) ?></td>
		</tr>

		<tr>
		<td>EXCEPTION/HOLIDAY DATES:</td>
		<td><?= form_input('exceptions', set_value('exceptions'), form_error('exceptions')) ?></td>
		</tr>

	<tr><th colspan="2">PLEASE INDICATE</th></tr>

		<tr>
		<td>COURSE TYPE:</td>
		<td>
			<?= form_dropdown('coursetype', $coursetypes, set_value('coursetype'), form_error('coursetype')) ?>
		</td>
		</tr>

		<tr>
		<td># CREDITS (if any):</td>
		<td><?= form_input('credits', set_value('credits'), form_error('credits')) ?></td>
		</tr>

		<tr>
		<td>CEU's (if any):</td>
		<td><?= form_input('ceus', set_value('ceus'), form_error('ceus')) ?></td>
		</tr>

		<tr>
		<td>CHECK ALL THAT APPLY:</td>
		<td>
			<?= form_checkbox('courseapply[]', 'Meeting', set_checkbox('courseapply', 'Meeting')) ?>     <span <?= form_error('courseapply') ?> >Meeting</span> 
			<?= form_checkbox('courseapply[]', 'Workshop', set_checkbox('courseapply', 'Workshop')) ?>   <span <?= form_error('courseapply') ?> >Workshop</span> 
			<?= form_checkbox('courseapply[]', 'Satellite', set_checkbox('courseapply', 'Satellite')) ?> <span <?= form_error('courseapply') ?> >Satellite</span> 
			<?= form_checkbox('courseapply[]', 'Training', set_checkbox('courseapply', 'Training')) ?>   <span <?= form_error('courseapply') ?> >Training</span> 
		</td>
		</tr>

	<tr><th colspan="2">INDICATE THE HOST SITE & ALL RECEIVE SITES </th></tr>

		<tr>
		<td>HOST SITE:</td>
		<td><?= form_dropdown('hostsite', $sites, set_value('hostsite'), form_error('hostsite')) ?></td>
		</tr>

		<tr>
		<td valign="top">OTHER HOST SITE:</td>
		<td><?= form_textarea(array('name'=>'otherhostsite', 'rows'=>'5', 'cols'=>'30'), set_value('otherhostsite'), form_error('otherhostsite')) ?></td>
		</tr>

		<tr>
		<td>RECEIVE SITE (1):</td>
		<td><?= form_dropdown('receive1', $sites, set_value('receive1'), form_error('receive1')) ?></td>
		</tr>

		<tr>
		<td>RECEIVE SITE (2):</td>
		<td><?= form_dropdown('receive2', $sites, set_value('receive2'), form_error('receive2')) ?></td>
		</tr>

		<tr>
		<td>RECEIVE SITE (3):</td>
		<td><?= form_dropdown('receive3', $sites, set_value('receive3'), form_error('receive3')) ?></td>
		</tr>

		<tr>
		<td>RECEIVE SITE (4):</td>
		<td><?= form_dropdown('receive4', $sites, set_value('receive4'), form_error('receive4')) ?></td>
		</tr>

		<tr>
		<td valign="top">OTHER SITES:</td>
		<td><?= form_textarea(array('name'=>'othersites', 'rows'=>'5', 'cols'=>'30'), set_value('othersites'), form_error('othersites')) ?></td>
		</tr>

		<tr>
		<td valign="top">COMMENTS:</td>
		<td><?= form_textarea(array('name'=>'comments', 'rows'=>'5', 'cols'=>'30'), set_value('comments'), form_error('comments')) ?></td>
		</tr>

		<tr>
		<td></td>
		<td><?= form_submit('submit', 'Submit New Event!'); ?> <?= form_button('reset', 'Reset Form', 'onClick="parent.location=\'newevent\'"') ?></td>
		</tr>

</table>
<?= form_close(); ?>