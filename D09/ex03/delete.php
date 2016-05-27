<?php
	if (isset($_POST['name']) && isset($_POST['content']))
	{
		$tab = get_tab();
		$key = array_search($_POST['content'], $tab);
		array_splice($tab, $key, 1);
		file_put_contents('list.csv', serialize($tab));
	}

	function get_tab()
	{
		if (!file_exists('list.csv'))
			return (array());
		$return = file_get_contents('list.csv');
		$return = unserialize($return);
		return ($return);
	}
?>