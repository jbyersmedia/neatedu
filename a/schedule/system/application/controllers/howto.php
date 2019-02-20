<?PHP

class Howto extends Controller {

	function index() {
		$data['title'] = 'How To';

		$this->load->view('header.php', $data);
		$this->load->view('howto/howto.php');
		$this->load->view('footer.php');

	}
	
}

?>