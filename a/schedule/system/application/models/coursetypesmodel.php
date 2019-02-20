<?PHP

class Coursetypesmodel extends Model {

	function all() {

		$coursetypes = array(
			'Credit Course/Degree Program'=>'Credit Course/Degree Program',
			'Credit Course'=>'Credit Course',
			'Non Credit Educational Event'=>'Non Credit Educational Event',
			'Non-Member Event'=>'Non-Member Event'
		);

		return $coursetypes;	
	}

}

?>