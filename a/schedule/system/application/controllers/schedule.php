<?PHP

class Schedule extends Controller {

	function index() {
		$data['title'] = 'ITV Schedule';
		$data['id'] = '';

		$this->load->model('Sitesmodel');
		$data['regions'] = $this->Sitesmodel->only_region();
		$data['sites'] = $this->Sitesmodel->all_sites1();

		$this->load->view('header.php', $data);
		$this->load->view('schedule/dropdown.php', $data);
		$this->load->view('footer.php');

	}

	function fetch_sites($region_id){
		$this->load->model('Sitesmodel');
		$data = $this->Sitesmodel->all_sites($region_id);
		echo json_encode($data);
	}
	function fetch_all(){
		$this->load->model('Sitesmodel');
		$data = $this->Sitesmodel->only_neat();
		echo json_encode($data);
	}

	function detail($id=null,$rid=null) {

		if($id=='two-day' && $rid==''){
			redirect('/schedule/detail/two-day/1');
		}

		$data['title'] = 'ITV Schedule';
		$data['id'] = $id;
		$data['lastdate'] = '';

		$this->load->model('Sitesmodel');
		$data['sites'] = $this->Sitesmodel->only_neat();
		$data['regions'] = $this->Sitesmodel->only_region();
		
		$data['regionid'] = $this->Sitesmodel->region_ID($id);
		$reid = $this->Sitesmodel->region_ID($id);
		
		if($reid=='' && $data['regionid']==''){
			$reid = $rid;
			$data['regionid']=$rid;
		}

		$this->load->model('Eventsmodel');
		if ($id == 'two-day') {
			$data['events'] = $this->Eventsmodel->two_day($id,$reid);
		} else {
			$data['events'] = $this->Eventsmodel->for_site($id,$reid);
		}

		$this->load->view('header.php', $data);
		$this->load->view('schedule/dropdown.php', $data);
		$this->load->view('schedule/detail.php', $data);
		$this->load->view('footer.php');
	}
	
}

?>