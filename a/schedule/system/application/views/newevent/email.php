<table>

		<tr>
		<td>YOUR NAME:</td>
		<td><?= $this->input->post('name') ?></td>
		</tr>
	
		<tr>
		<td>YOUR EMAIL:</td>
		<td><?= $this->input->post('email') ?></td>
		</tr>
	
		<tr>
		<td>COURSE/MEETING TITLE:</td>
		<td><?= $this->input->post('coursetitle') ?></td>
		</tr>
	
		<tr>
		<td>COURSE#:</td>
		<td><?= $this->input->post('coursenumber') ?></td>
		</tr>
	
		<tr>
		<td>INSTRUCTOR:</td>
		<td><?= $this->input->post('instructor') ?></td>
		</tr>

	<tr><td colspan="2"><h1 style="font-size: 20px; margin-top: 10px;">EVENT DATES</h1></td></tr>

		<tr>
		<td>DAYS:</td>
		<td><?= (is_array($this->input->post('days')) ? join(', ',$this->input->post('days')) : '') ?></td>
		</tr>

		<tr>
		<td>START TIME:</td>
		<td><?= $this->input->post('starttime') ?> <?= $this->input->post('startampm') ?></td>
		</tr>

		<tr>
		<td>STOP TIME:</td>
		<td><?= $this->input->post('stoptime') ?> <?= $this->input->post('stopampm') ?></td>
		</tr>

		<tr>
		<td>START / END DATES:</td>
		<td><?= $this->input->post('startdate') ?> / <?= $this->input->post('enddate') ?></td>
		</tr>

		<tr>
		<td>INTERMEDIATE DATES:</td>
		<td><?= $this->input->post('intermediatedates') ?></td>
		</tr>

		<tr>
		<td>EXCEPTION/HOLIDAY DATES:</td>
		<td><?= $this->input->post('exceptions') ?></td>
		</tr>

	<tr><td colspan="2"><h1 style="font-size: 20px; margin-top: 10px;">PLEASE INDICATE</h1></td></tr>

		<tr>
		<td>COURSE TYPE:</td>
		<td><?= $this->input->post('coursetype') ?></td>
		</tr>

		<tr>
		<td># CREDITS (if any):</td>
		<td><?= $this->input->post('credits') ?></td>
		</tr>

		<tr>
		<td>CEU's (if any):</td>
		<td><?= $this->input->post('ceus') ?></td>
		</tr>

		<tr>
		<td>CHECK ALL THAT APPLY:</td>
		<td><?= (is_array($this->input->post('courseapply'))  ? join(', ',$this->input->post('courseapply')) : '') ?></td>
		</tr>

	<tr><td colspan="2"><h1 style="font-size: 20px; margin-top: 10px;">INDICATE THE HOST SITE & ALL RECEIVE SITES</h1></td></tr>

		<tr>
		<td>HOST SITE:</td>
		<td><?= $this->input->post('hostsite') ?></td>
		</tr>

		<tr>
		<td valign="top">OTHER HOST SITE:</td>
		<td><?= $this->input->post('otherhostsite') ?></td>
		</tr>

		<tr>
		<td>RECEIVE SITE (1):</td>
		<td><?= $this->input->post('receive1') ?></td>
		</tr>

		<tr>
		<td>RECEIVE SITE (2):</td>
		<td><?= $this->input->post('receive2') ?></td>
		</tr>

		<tr>
		<td>RECEIVE SITE (3):</td>
		<td><?= $this->input->post('receive3') ?></td>
		</tr>

		<tr>
		<td>RECEIVE SITE (4):</td>
		<td><?= $this->input->post('receive4') ?></td>
		</tr>

		<tr>
		<td valign="top">OTHER SITES:</td>
		<td><?= $this->input->post('othersites') ?></td>
		</tr>

		<tr>
		<td valign="top">COMMENTS:</td>
		<td><?= $this->input->post('comments') ?></td>
		</tr>

</table>