<?php
	if ($_GET['action'] == "set" && $_GET['value'] != null)
	{
		setcookie($_GET['name'], $_GET['value'], time() + (86400 * 30), "/");
	}
	elseif ($_GET['action'] == "del")
	{
		setcookie($_GET['name'], "");
	}
	elseif ($_GET['action'] == "get" && $_COOKIE[$_GET['name']])
	{
		$val = $_GET['name'];
		echo $_COOKIE[$_GET['name']].PHP_EOL;
	}
?>
