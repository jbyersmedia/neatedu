<?PHP

class Eventsdatestimesmodel extends Model {

    function Eventsdatestimesmodel() { parent::Model(); }
	
	function delete_all() {
		$this->db->empty_table('ressched_EventDatesTimes');
	}

	function create($data) {
		$this->db->insert('ressched_EventDatesTimes', $data);
	}

}

?>