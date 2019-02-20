<?PHP

class Sitecontactsmodel extends Model {

    function Sitecontactsmodel() { parent::Model(); }

    function all() {
		
		$this->db->from('ressched_SiteContacts AS c');
		$this->db->join('ressched_Sites AS s', 'c.siteID = s.siteID');
		$this->db->order_by("siteName", "asc");
		$this->db->order_by("contactFirstName", "asc");
		$this->db->order_by("contactLastName", "asc");
		$this->db->where('sitePublish', 'Y');
		$this->db->where('siteNeatMember', 'Y');
		$data = $this->db->get();

		if ($data->num_rows() > 0) { $result = $data->result_array(); } else { $result = false; }

		return $result;
	}

    function for_site($id) {
		
		$this->db->from('ressched_SiteContacts');
		$this->db->order_by("contactFirstName", "asc");
		$this->db->order_by("contactLastName", "asc");
		$this->db->where('siteID', $id);
		$data = $this->db->get();

		if ($data->num_rows() > 0) { $result = $data->result_array(); } else { $result = false; }

		return $result;
	}

    function single($id) {
		
		$this->db->from('ressched_SiteContacts AS c');
		$this->db->join('ressched_Sites AS s', 'c.siteID = s.siteID');
		$this->db->where('contactID', $id);
		$data = $this->db->get();

		if ($data->num_rows() > 0) { $result = $data->row_array(); } else { $result = false; }

		return $result;
	}

}

?>