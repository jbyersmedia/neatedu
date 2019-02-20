<?PHP

class Aboutus extends Controller {

	function index() {
		$data['title'] = 'About Us';

		$this->load->view('header.php', $data);
		$this->load->view('aboutus/aboutus.php');
		$this->load->view('footer.php');

	}
	
}

?>