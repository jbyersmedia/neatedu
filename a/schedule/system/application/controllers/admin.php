<?PHP

class Admin extends Controller {


	function _filesconfig() {
		$path				= '../scheduledata/';
		$events				= 'ressched_Events.txt';
		$eventsdatestimes	= 'ressched_EventDatesTimes.txt';
		$eventsothersites	= 'ressched_EventsOtherSites.txt';

		return array($path.$events, $path.$eventsdatestimes, $path.$eventsothersites);
	}

	function _validatefiles() {
		list($events, $eventsdatestimes, $eventsothersites) = $this->_filesconfig();

		if (!file_exists($events))				{ return array(false, 'Cannot open Events file'); }
		if (!file_exists($eventsdatestimes))	{ return array(false, 'Cannot open EventsDatestimes file'); }
		if (!file_exists($eventsothersites))	{ return array(false, 'Cannot open EventsOtherSites file'); }

		$e1 = file($events);
		$e2 = file($eventsdatestimes);
		$e3 = file($eventsothersites);

		if (count($e1) <= 1) { return array(false, 'Events file has no data'); }
		if (count($e2) <= 1) { return array(false, 'EventsDatestimes file has no data'); }
		if (count($e3) <= 1) { return array(false, 'EventsOtherSites file has no data'); }

		if (rtrim($e1[0]) != "eventID\teventName\tprimarySiteCode\tprimarySiteRoomCode\teventHost")	{ return array(false, 'Events has an incorrect header'); }
		if (rtrim($e2[0]) != "eventID\teventDate\ttimeConnect\ttimeStart\ttimeEnd")					{ return array(false, 'EventsDatestimes has an incorrect header'); }
		if (rtrim($e3[0]) != "eventID\totherSiteCode\totherSiteRoomCode")							{ return array(false, 'EventsOtherSites has an incorrect header'); }

		return array(true, 'success');
	}

	function index() {
		$data['title'] = 'Admin';

		if(!$this->session->userdata('logged_in')) { redirect('admin/loginform'); return; }

		list($data['validated'], $data['msg']) = $this->_validatefiles();

		$this->load->view('header.php', $data);
		$this->load->view('admin/admin.php', $data);
		$this->load->view('footer.php');

	}

	function loginform() {
			$data['title'] = 'Log In';

			$this->load->view('header.php', $data);
			$this->load->view('admin/login.php', $data);
			$this->load->view('footer.php');
	}

	function logout() {
		$this->simplelogin->logout();
		redirect('/admin/');
	}

	function login() {
		$this->simplelogin->login($this->input->post('username'), $this->input->post('password'));
		redirect('/admin/');
	}

	function update() {
		list($data['success'], $data['msg']) = $this->_validatefiles();

		if (!$data['success']) {
			$this->session->set_flashdata('message', 'Events NOT updated.  Files did not validate.  Reason: '.$data['msg']);
			redirect('/admin/');
			return;
		}

		list($events, $eventsdatestimes, $eventsothersites) = $this->_filesconfig();

		$e1 = file($events);
		$this->load->model('Eventsmodel');
		$this->Eventsmodel->delete_all();
		for ($i = 1; $i < count($e1); $i++) {

			$row = explode("\t", rtrim($e1[$i]));

			if (count($row) == 5) {
				$this->Eventsmodel->create(array(
					'eventID'				=>$row[0],
					'eventName'				=>$row[1],
					'primarySiteCode'		=>$row[2],
					'primarySiteRoomCode'	=>$row[3],
					'eventHost'				=>$row[4]
				));
			}

		}

		$e2 = file($eventsdatestimes);
		$this->load->model('Eventsdatestimesmodel');
		$this->Eventsdatestimesmodel->delete_all();
		for ($i = 1; $i < count($e2); $i++) {

			$row = explode("\t", rtrim($e2[$i]));

			if (count($row) == 5) {
				$this->Eventsdatestimesmodel->create(array(
					'eventID'=>$row[0],
					'eventDate'=>$row[1],
					'timeConnect'=>$row[2],
					'timeStart'=>$row[3],
					'timeEnd'=>$row[4]
				));
			}

		}

		$e3 = file($eventsothersites);
		$this->load->model('Eventsothersitesmodel');
		$this->Eventsothersitesmodel->delete_all();
		for ($i = 1; $i < count($e3); $i++) {

			$row = explode("\t", rtrim($e3[$i]));

			if (count($row) == 3) {
				$this->Eventsothersitesmodel->create(array(
					'eventID'			=>$row[0],
					'otherSiteCode'		=>$row[1],
					'otherSiteRoomCode'	=>$row[2]
				));
			}

		}

		$this->session->set_flashdata('message', 'Events updated successfully');
		redirect('/admin/');
	}

}

?>
