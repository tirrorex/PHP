<?php
	$tab = get_tab();
	echo json_encode($tab);


	function get_tab()
	{
		if (!file_exists('list.csv'))
			return (array());
		$return = file_get_contents('list.csv');
		$return = unserialize($return);
		return ($return);
	}
?>