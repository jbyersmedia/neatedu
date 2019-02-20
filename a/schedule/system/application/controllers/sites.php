<?PHP

class Sites extends Controller {

	function index() {
		$data['title'] = 'ITV Sites';

		$this->load->model('Sitesmodel');
		$data['sites'] = $this->Sitesmodel->only_neat();

		$this->load->view('header.php', $data);
		$this->load->view('sites/sites.php');
		$this->load->view('footer.php');

	}
	
	function detail($id=null) {
		$data['title'] = 'ITV Site Detail';

		$this->load->model('Sitesmodel');
		$data['site'] = $this->Sitesmodel->for_site($id);

		$this->load->model('Sitecontactsmodel');
		$data['contacts'] = $this->Sitecontactsmodel->for_site($id);

		$this->load->model('Siteroomsmodel');
		$data['rooms'] = $this->Siteroomsmodel->for_site($id);

		$this->load->view('header.php', $data);
		$this->load->view('sites/detail.php');
		$this->load->view('sites/contacts.php');
		$this->load->view('sites/rooms.php');
		$this->load->view('footer.php');
	}

	function city($id=null) {
		$data['title'] = 'ITV Sites';

		$this->load->model('Sitesmodel');
		$data['sites'] = $this->Sitesmodel->for_city($id);

		$this->load->view('header.php', $data);
		$this->load->view('sites/sites.php');
		$this->load->view('footer.php');

	}

}

?>