<?PHP

class Newevent extends Controller {

	function index() {
		$data['title'] = 'ITV Event Schedule Form';
		$data['id'] = '';

		$this->load->model('Sitesmodel');
		$data['sites'] = keyval_array($this->Sitesmodel->only_eventform(), 'siteName', 'siteName');
		$data['sites'] = array_merge(array(''=>'--- Choose Site ---'), $data['sites']);

		$this->load->model('Coursetypesmodel');
		$data['coursetypes'] = $this->Coursetypesmodel->all();

		$this->load->view('header.php', $data);
		$this->load->view('newevent/newevent.php', $data);
		$this->load->view('footer.php');

	}

	function create() {
		$data['title'] = 'ITV Event Schedule Form';
		$data['id'] = '';

		$this->load->model('Sitesmodel');
		$data['sites'] = keyval_array($this->Sitesmodel->only_eventform(), 'siteName', 'siteName');
		$data['sites'] = array_merge(array(''=>'--- Choose Site ---'), $data['sites']);

		$this->load->model('Coursetypesmodel');
		$data['coursetypes'] = $this->Coursetypesmodel->all();

		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('coursetitle', 'coursetitle', 'required');
		$this->form_validation->set_rules('coursenumber', 'coursenumber', '');
		$this->form_validation->set_rules('instructor', 'instructor', '');

		$this->form_validation->set_rules('days', 'days', 'required');

		$this->form_validation->set_rules('starttime', 'starttime', 'required');
		$this->form_validation->set_rules('startampm', 'startampm', 'required');

		$this->form_validation->set_rules('stoptime', 'stoptime', 'required');
		$this->form_validation->set_rules('stopampm', 'stopampm', 'required');

		$this->form_validation->set_rules('startdate', 'startdate', 'required');
		$this->form_validation->set_rules('enddate', 'enddate', 'required');

		$this->form_validation->set_rules('intermediatedates', 'intermediatedates', '');
		$this->form_validation->set_rules('exceptions', 'exceptions', '');

		$this->form_validation->set_rules('coursetype', 'coursetype', '');
		$this->form_validation->set_rules('credits', 'credits', '');
		$this->form_validation->set_rules('ceus', 'ceus', '');
		$this->form_validation->set_rules('courseapply', 'courseapply', '');

		$this->form_validation->set_rules('hostsite', 'hostsite', '');
		$this->form_validation->set_rules('otherhostsite', 'otherhostsite', '');
		$this->form_validation->set_rules('receive1', 'receive1', '');
		$this->form_validation->set_rules('receive2', 'receive2', '');
		$this->form_validation->set_rules('receive3', 'receive3', '');
		$this->form_validation->set_rules('receive4', 'receive4', '');
		$this->form_validation->set_rules('othersites', 'othersites', '');
		$this->form_validation->set_rules('receive4', 'receive4', '');
		$this->form_validation->set_rules('comments', 'comments', '');

		$this->form_validation->set_message('required', 'class="required"');
		$this->form_validation->set_message('valid_email', 'class="required"');

		$this->form_validation->set_error_delimiters('', '');

		$data['success'] = $this->form_validation->run();
	
		if ($data['success']) {

			$config['mailtype'] = 'html';

			# First Email
			$this->email->clear();
			$this->email->initialize($config);
			$this->email->from('noreply@neatedu.net','NEAT');
			$this->email->message($this->load->view('newevent/email.php', $data, true));

			$this->email->to('r.pelto@neatedu.net');
			$this->email->bcc('jmccauley@byersmedia.com');
			$this->email->subject('REQUEST TO SCHEDULE ITV CLASS');
			$this->email->send();

			# Second Email
			$this->email->clear();
			$this->email->initialize($config);
			$this->email->from('noreply@neatedu.net','NEAT');
			$this->email->message($this->load->view('newevent/email.php', $data, true));

			$this->email->to($this->input->post('email'));
			$this->email->bcc(false);
			$this->email->subject('REQUEST TO SCHEDULE ITV CLASS (COPY)');
			$this->email->send();


			# Save request to database
			$this->load->model('Neweventsformmodel');
			$this->Neweventsformmodel->create();

			# Success page
			$this->load->view('header.php', $data);
			$this->load->view('newevent/success.php', $data);
			$this->load->view('newevent/newevent.php', $data);
			$this->load->view('footer.php');
		} else {
			$this->load->view('header.php', $data);
			$this->load->view('newevent/newevent.php', $data);
			$this->load->view('footer.php');
		}
	}

	
}

?>