<?PHP

class Siteroomsmodel extends Model {

    function Siteroomsmodel() { parent::Model(); }

    function all() {
		
		$this->db->from('ressched_SiteRooms AS r');
		$this->db->join('ressched_Sites AS s', 'r.siteID = s.siteID');
		$this->db->order_by("siteName", "asc");
		$this->db->order_by("roomCode", "asc");
		$this->db->where('sitePublish', 'Y');
		$this->db->where('siteNeatMember', 'Y');
		$this->db->where('roomPublished', 'Y');
		$this->db->where('regionID', 1);
		$data = $this->db->get();
		
		if ($data->num_rows() > 0) { $result = $data->result_array(); } else { $result = false; }

		return $result;
	}

    function for_site($id) {
		
		$this->db->from('ressched_SiteRooms');
		$this->db->order_by("roomCode", "asc");
		$this->db->where('siteID', $id);
		$this->db->where('roomPublished', 'Y');
		$data = $this->db->get();

		if ($data->num_rows() > 0) { $result = $data->result_array(); } else { $result = false; }

		return $result;
	}

    function single($id) {
		
		$this->db->from('ressched_SiteRooms AS r');
		$this->db->join('ressched_Sites AS s', 'r.siteID = s.siteID');
		$this->db->where('roomID', $id);
		$this->db->where('roomPublished', 'Y');
		$data = $this->db->get();

		if ($data->num_rows() > 0) { $result = $data->row_array(); } else { $result = false; }

		return $result;
	}

}

?>