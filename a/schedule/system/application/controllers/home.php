<?PHP

class Home extends Controller {

	function index() {
		$data['title'] = '';

		$this->load->model('Sitesmodel');
		$data['sites'] = $this->Sitesmodel->only_neat();

		$this->load->view('header.php', $data);
		$this->load->view('home/map.php');
		$this->load->view('home/dropdown.php', $data);
		$this->load->view('footer.php');

	}
}

?>