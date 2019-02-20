<?PHP

class Eventsothersitesmodel extends Model {

    function Eventsothersitesmodel() { parent::Model(); }
	
	function delete_all() {
		$this->db->empty_table('ressched_EventsOtherSites');
	}

	function create($data) {
		$this->db->insert('ressched_EventsOtherSites', $data);
	}
}

?>