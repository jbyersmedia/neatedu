<?PHP

class Contacts extends Controller {

	function index() {
		$data['title'] = 'Contacts Directory';
		$data['lastsite'] = '';

		$this->load->model('Sitecontactsmodel');
		$data['contacts'] = $this->Sitecontactsmodel->all();

		$this->load->view('header.php', $data);
		$this->load->view('contacts/contacts.php');
		$this->load->view('footer.php');

	}
	
	function detail($id=null) {
		$data['title'] = 'Contacts Directory';

		$this->load->model('Sitecontactsmodel');
		$data['contact'] = $this->Sitecontactsmodel->single($id);

		$this->load->view('header.php', $data);
		$this->load->view('contacts/detail.php');
		$this->load->view('footer.php');
	}

}

?>