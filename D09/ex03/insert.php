<?php
	if (isset($_POST['name']) && isset($_POST['content']))
	{
		$tab = get_tab();
		$tab[] = array('name' => $_POST['name'], 'content' => $_POST['content']);
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