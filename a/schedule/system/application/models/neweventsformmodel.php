<?PHP

class Neweventsformmodel extends Model {

    function Sitesmodel() { parent::Model(); }
	
	function create() {
		$data = array(
			'name'				=>$this->input->post('name'),
			'email'				=>$this->input->post('email'),
			'coursetitle'		=>$this->input->post('coursetitle'),
			'coursenumber'		=>$this->input->post('coursenumber'),
			'instructor'		=>$this->input->post('instructor'),
			'days'				=>(is_array($this->input->post('days')) ? join(', ',$this->input->post('days')) : ''),
			'starttime'			=>$this->input->post('starttime'),
			'startampm'			=>$this->input->post('startampm'),
			'stoptime'			=>$this->input->post('stoptime'),
			'stopampm'			=>$this->input->post('stopampm'),
			'startdate'			=>$this->input->post('startdate'),
			'enddate'			=>$this->input->post('enddate'),
			'intermediatedates'	=>$this->input->post('intermediatedates'),
			'exceptions'		=>$this->input->post('exceptions'),
			'coursetype'		=>$this->input->post('coursetype'),
			'credits'			=>$this->input->post('credits'),
			'ceus'				=>$this->input->post('ceus'),
			'courseapply'		=>(is_array($this->input->post('courseapply'))  ? join(', ',$this->input->post('courseapply')) : ''),
			'hostsite'			=>$this->input->post('hostsite'),
			'otherhostsite'		=>$this->input->post('otherhostsite'),
			'receive1'			=>$this->input->post('receive1'),
			'receive2'			=>$this->input->post('receive2'),
			'receive3'			=>$this->input->post('receive3'),
			'receive4'			=>$this->input->post('receive4'),
			'othersites'		=>$this->input->post('othersites'),
			'comments'			=>$this->input->post('comments')		
		);

		$this->db->set('created', 'NOW()', FALSE);
		$this->db->insert('ressched_NewEventsForm', $data); 
	}

}

?>



