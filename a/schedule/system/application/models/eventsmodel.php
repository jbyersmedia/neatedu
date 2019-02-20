<?PHP

class Eventsmodel extends Model {

    function Eventsmodel() { parent::Model(); }

	function for_site($id) {

		$query = '
			SELECT
			e.eventID,
			e.eventName,
			e.eventHost,

			DATE_FORMAT(d.eventDate,"%W %M %e, %Y") AS eventDate,
			DATE_FORMAT(d.timeConnect, "%l:%i %p") AS timeConnect,
			DATE_FORMAT(d.timeStart, "%l:%i %p") AS timeStart,
			DATE_FORMAT(d.timeEnd, "%l:%i %p") AS timeEnd,

			GROUP_CONCAT(
				REPLACE(CONCAT(s.siteName, " (", r.roomName,")"), "\n", "")
				ORDER BY s.siteName ASC
				SEPARATOR "\n"
				) AS siteList

			FROM ressched_Events AS e
			JOIN ressched_EventDatesTimes AS d ON e.eventID = d.eventID

			LEFT JOIN ressched_EventsOtherSites AS o ON e.eventID = o.eventID
			JOIN ressched_Sites AS s ON o.otherSiteCode = s.siteCode AND s.sitePublish = "Y"
			JOIN ressched_SiteRooms AS r ON s.siteID = r.siteID AND o.otherSiteRoomCode = r.roomCode AND r.roomPublished = "Y"

			WHERE 1
			AND d.eventDate >= CURDATE()
			AND d.eventDate < DATE_ADD(CURDATE(), INTERVAL 30 DAY)
			AND EXISTS
				(
				SELECT *
				FROM ressched_Sites AS subs
				JOIN ressched_EventsOtherSites AS subo ON subs.siteCode = subo.otherSiteCode
				WHERE subs.siteID = ?
				AND subs.sitePublish = "Y"
				AND subs.siteNeatMember = "Y"
				AND e.eventID = subo.eventID
				)

			GROUP BY e.eventID, d.eventDate, d.timeConnect, d.timeStart, d.timeEnd
			ORDER BY d.eventDate ASC, d.timeConnect ASC, d.timeStart ASC, d.timeEnd ASC, e.eventName ASC
		';

		$data = $this->db->query($query, array($id)); 
	
		if ($data->num_rows() > 0) { $result = $data->result_array(); } else { $result = false; }
		
		return $result;
	}


	function two_day($id) {

		$query = '
			SELECT
			e.eventID,
			e.eventName,
			e.eventHost,

			DATE_FORMAT(d.eventDate,"%W %M %e, %Y") AS eventDate,
			DATE_FORMAT(d.timeConnect, "%l:%i %p") AS timeConnect,
			DATE_FORMAT(d.timeStart, "%l:%i %p") AS timeStart,
			DATE_FORMAT(d.timeEnd, "%l:%i %p") AS timeEnd,

			GROUP_CONCAT(
				REPLACE(CONCAT(s.siteName, " (", r.roomName,")"), "\n", "")
				ORDER BY s.siteName ASC
				SEPARATOR "\n"
				) AS siteList

			FROM ressched_Events AS e
			JOIN ressched_EventDatesTimes AS d ON e.eventID = d.eventID

			LEFT JOIN ressched_EventsOtherSites AS o ON e.eventID = o.eventID
			JOIN ressched_Sites AS s ON o.otherSiteCode = s.siteCode AND s.sitePublish = "Y"
			JOIN ressched_SiteRooms AS r ON s.siteID = r.siteID AND o.otherSiteRoomCode = r.roomCode

			WHERE 1
			AND d.eventDate >= CURDATE()
			AND d.eventDate < DATE_ADD(CURDATE(), INTERVAL 2 DAY)
			AND EXISTS
				(
				SELECT *
				FROM ressched_Sites AS subs
				JOIN ressched_EventsOtherSites AS subo ON subs.siteCode = subo.otherSiteCode
				AND subs.sitePublish = "Y"
				AND subs.siteNeatMember = "Y"
				WHERE e.eventID = subo.eventID
				)

			GROUP BY e.eventID, d.eventDate, d.timeConnect, d.timeStart, d.timeEnd
			ORDER BY d.eventDate ASC, d.timeConnect ASC, d.timeStart ASC, d.timeEnd ASC, e.eventName ASC
		';

		$data = $this->db->query($query); 
	
		if ($data->num_rows() > 0) { $result = $data->result_array(); } else { $result = false; }
		
		return $result;
	}

	function delete_all() {
		$this->db->empty_table('ressched_Events');
	}

	function create($data) {
		$this->db->insert('ressched_Events', $data);
	}

}
?>