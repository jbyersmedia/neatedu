<?PHP

class Schedule extends Controller {

	function index() {
		$data['title'] = 'ITV Schedule';
		$data['id'] = '';

		$this->load->model('Sitesmodel');
		$data['sites'] = $this->Sitesmodel->only_neat();

		$this->load->view('header.php', $data);
		$this->load->view('schedule/dropdown.php', $data);
		$this->load->view('footer.php');

	}

	function detail($id=null) {
		$data['title'] = 'ITV Schedule';
		$data['id'] = $id;
		$data['lastdate'] = '';

		$this->load->model('Sitesmodel');
		$data['sites'] = $this->Sitesmodel->only_neat();

		$this->load->model('Eventsmodel');
		if ($id == 'two-day') {
			$data['events'] = $this->Eventsmodel->two_day($id);
		} else {
			$data['events'] = $this->Eventsmodel->for_site($id);
		}

		$this->load->view('header.php', $data);
		$this->load->view('schedule/dropdown.php', $data);
		$this->load->view('schedule/detail.php', $data);
		$this->load->view('footer.php');
	}
	
}

?>