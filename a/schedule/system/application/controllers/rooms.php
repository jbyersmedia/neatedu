<?PHP

class Rooms extends Controller {

	function index() {
		$data['title'] = 'Room List';
		$data['lastsite'] = '';

		$this->load->model('Siteroomsmodel');
		$data['rooms'] = $this->Siteroomsmodel->all();

		$this->load->view('header.php', $data);
		$this->load->view('rooms/rooms.php');
		$this->load->view('footer.php');

	}
	
	function detail($id=null) {
		$data['title'] = 'Room Detail';

		$this->load->model('Siteroomsmodel');
		$data['room'] = $this->Siteroomsmodel->single($id);

		$this->load->view('header.php', $data);
		$this->load->view('rooms/detail.php');
		$this->load->view('footer.php');
	}

}

?>