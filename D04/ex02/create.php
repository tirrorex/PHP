<?php
	function get_tab()
	{
		if (!file_exists('../private/passwd'))
			return (array());
		$return = file_get_contents('../private/passwd');
		$return = unserialize($return);
		return ($return);
	}

	function check_tab($tab, $login)
	{
		foreach ($tab as $value) {
			if ($value['login'] == $login)
				return (true);
		}
		return (false);
	}

	if (!isset($_POST['login']) || $_POST['login'] == "" || !isset($_POST['passwd'])  || $_POST['passwd'] == "" || !isset($_POST['submit']) || $_POST['submit'] != 'OK')
		exit ("ERROR\n");
	$tab = get_tab();
	if (check_tab($tab, $_POST['login']))
		exit ("ERROR\n");
	$tab[] = array('login' => $_POST['login'], "passwd" => hash('whirlpool', $_POST['passwd']));
	if (!file_exists('../private'))
		mkdir('../private');
	file_put_contents('../private/passwd', serialize($tab));
	echo "OK\n";
?>
