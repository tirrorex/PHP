<?php
	function get_tab()
	{
		if (!file_exists('../private/passwd'))
			return (array());
		$return = file_get_contents('../private/passwd');
		$return = unserialize($return);
		return ($return);
	}

	function auth($login, $passwd)
	{
		$tab = get_tab();
		foreach ($tab as $key => $value) {
			if (isset($value['login']) && $value['login'] == $login)
			{
				if (isset($value['passwd']) && $value['passwd'] == hash('whirlpool', $passwd))
					return (true);
				break;
			}
		}
		return (false);
	}
?>