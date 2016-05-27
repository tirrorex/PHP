<?php
	function get_tab()
	{
		if (!file_exists('../private/passwd'))
			return (array());
		$return = file_get_contents('../private/passwd');
		$return = unserialize($return);
		return ($return);
	}

	function check_login($tab, $login)
	{
		foreach ($tab as $value) {
			if ($value['login'] == $login)
				return (true);
		}
		return (false);
	}

	function change_pw($tab, $oldhash)
	{
		foreach ($tab as $key => $value) {
			if (isset($value['login']) && $value['login'] == $_POST['login'])
			{
				if (isset($value['passwd']) && $value['passwd'] == $oldhash)
				{
					$tab[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
					file_put_contents('../private/passwd', serialize($tab));
					return (true);
				}
				break;
			}
		}
		return (false);
	}

	if (!isset($_POST['login']) || $_POST['login'] == "" || !isset($_POST['oldpw'])  || $_POST['oldpw'] == "" ||
		!isset($_POST['newpw']) || $_POST['newpw'] == "" ||  !isset($_POST['submit']) || $_POST['submit'] != 'OK')
		exit ("ERROR\n");
	$tab = get_tab();
	if (change_pw($tab, hash('whirlpool', $_POST['oldpw'])))
		exit ("OK\n");
	exit ("ERROR\n");
?>
