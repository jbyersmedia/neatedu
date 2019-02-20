<?PHP

function keyval_array($array, $key, $value) {
	if (!is_array($array)) { return false; }

	$newarray = array();
	foreach ($array as $a) {
		$k = $a[$key];
		$v = $a[$value];
		
		$newarray[$k] = $v;
	}
	
	return $newarray;
}

?>