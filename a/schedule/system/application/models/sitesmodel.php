<?PHP

class Sitesmodel extends Model {

    function Sitesmodel() { parent::Model(); }

	function all() {
	
		$this->db->select('
			s.siteID,
			s.siteCode,
			s.siteName,
			s.siteCity,
			s.siteState,
			siteURL,
			COUNT(r.roomCode) as roomCount
		');
		$this->db->from('ressched_Sites AS s');
		$this->db->join('ressched_SiteRooms AS r', 's.siteID = r.siteID AND r.roomPublished = "Y"', 'left');
		$this->db->group_by('s.siteID');
		$this->db->order_by("s.siteName", "asc");
		$this->db->where('sitePublish', 'Y');

		$data = $this->db->get();
	
		if ($data->num_rows() > 0) { $result = $data->result_array(); } else { $result = false; }

		return $result;
	}

	function only_neat() {
	
		$this->db->select('
			s.siteID,
			s.siteCode,
			s.siteName,
			s.siteCity,
			s.siteState,
			siteURL,
			COUNT(r.roomCode) as roomCount
		');
		$this->db->from('ressched_Sites AS s');
		$this->db->join('ressched_SiteRooms AS r', 's.siteID = r.siteID AND r.roomPublished = "Y"', 'left');
		$this->db->group_by('s.siteID');
		$this->db->order_by("s.siteName", "asc");
		$this->db->where('sitePublish', 'Y');
		$this->db->where('siteNeatMember', 'Y');
		$this->db->where('s.regionID', 1);

		$data = $this->db->get();
	
		if ($data->num_rows() > 0) { $result = $data->result_array(); } else { $result = false; }

		return $result;
	}

	function only_eventform() {
	
		$this->db->select('
			s.siteID,
			s.siteCode,
			s.siteName,
			s.siteCity,
			s.siteState,
			siteURL,
			COUNT(r.roomCode) as roomCount
		');
		$this->db->from('ressched_Sites AS s');
		$this->db->join('ressched_SiteRooms AS r', 's.siteID = r.siteID AND r.roomPublished = "Y"', 'left');
		$this->db->group_by('s.siteID');
		$this->db->order_by("s.siteName", "asc");
		$this->db->where('sitePublish', 'Y');
		$this->db->where('siteOnEventScheduleForm', 'Y');

		$data = $this->db->get();
	
		if ($data->num_rows() > 0) { $result = $data->result_array(); } else { $result = false; }

		return $result;
	}

	function for_city($id) {
	
		$this->db->select('
			s.siteID,
			s.siteCode,
			s.siteName,
			s.siteCity,
			s.siteState,
			siteURL,
			COUNT(r.roomCode) as roomCount
		');
		$this->db->from('ressched_Sites AS s');
		$this->db->join('ressched_SiteRooms AS r', 's.siteID = r.siteID AND r.roomPublished = "Y"', 'left');
		$this->db->group_by('s.siteID');
		$this->db->order_by("s.siteName", "asc");
		$this->db->where('sitePublish', 'Y');
		$this->db->where('siteNeatMember', 'Y');
		$this->db->where('sitecity', $id);

		$data = $this->db->get();
	
		if ($data->num_rows() > 0) { $result = $data->result_array(); } else { $result = false; }

		return $result;
	}

	function for_site($id) {
	
		$this->db->from('ressched_Sites');
		$this->db->where('siteID', $id);
		$this->db->where('sitePublish', 'Y');
		$data = $this->db->get();

		if ($data->num_rows() > 0) { $result = $data->row_array(); } else { $result = false; }

		return $result;
	
	}

	function only_region() {
	
		$this->db->select('
			regionID,
			regionCode,
			regionName
		');
		$this->db->from('ressched_Regions');

		$data = $this->db->get();
	
		if ($data->num_rows() > 0) { $result = $data->result_array(); } else { $result = false; }

		return $result;
	}
	
	
	function all_sites($region_id) {
		
		$this->db->select('
			s.siteID,
			s.siteCode,
			s.siteName,
			s.siteCity,
			s.siteState,
			siteURL,
		');
		$this->db->from('ressched_Sites AS s');
		$this->db->where('sitePublish', 'Y');
		$this->db->where('siteNeatMember', 'Y');
		$this->db->where('regionID', $region_id);
		
		$data = $this->db->get();

		if ($data->num_rows() > 0) { $result = $data->result_array(); } else { $result = false; }
		
		return $result;
	}



	function all_sites1() {
		
		$this->db->select('
			s.siteID,
			s.siteCode,
			s.siteName,
			s.siteCity,
			s.siteState,
			siteURL,
		');
		$this->db->from('ressched_Sites AS s');
		$this->db->where('sitePublish', 'Y');
		$this->db->where('siteNeatMember', 'Y');
		
		$data = $this->db->get();

		if ($data->num_rows() > 0) { $result = $data->result_array(); } else { $result = false; }
		
		return $result;
	}



	function region_ID($id) {
	
		$this->db->select('
			regionID
		');
		$this->db->from('ressched_Sites');
		$this->db->where('siteID', $id);
		
		$data = $this->db->get();
	
		if ($data->num_rows() > 0) { $result = $data->result_array(); } else { $result = false; }

		return $result;
	}
	
	function neat_site() {
		
		$this->db->select('
			s.siteID,
			s.siteCode,
			s.siteName,
			s.siteCity,
			s.siteState,
			siteURL,
			COUNT(r.roomCode) as roomCount
		');
		$this->db->from('ressched_Sites AS s');
		$this->db->join('ressched_SiteRooms AS r', 's.siteID = r.siteID AND r.roomPublished = "Y"', 'left');
		$this->db->group_by('s.siteID');
		$this->db->order_by("s.siteName", "asc");
		$this->db->where('sitePublish', 'Y');
		$this->db->where('siteNeatMember', 'Y');
		$this->db->where('regionID', 1);
		
		$data = $this->db->get();
		
		if ($data->num_rows() > 0) { $result = $data->result_array(); } else { $result = false; }
		
		return $result;
	}

}

?>