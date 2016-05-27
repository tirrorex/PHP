<?php
	function get_tab()
	{
		if (!file_exists('../private/chat'))
			return (array());
		$return = file_get_contents('../private/chat');
		$return = unserialize($return);
		return ($return);
	}

	session_start();
	if ($_SESSION['loggued_on_user'] != "")
	{		
		$tab = get_tab();
		if (file_exists('../private/chat'))
		{
			$fd = fopen('../private/chat', 'r');
			flock($fd, LOCK_EX);
			date_default_timezone_set("Europe/Paris");
			foreach ($tab as $msg) {
				echo "[".date('H:i', $msg['time'])."]"." "."<b>".$msg['login']."</b>: ".$msg['msg']."<br />".PHP_EOL;
			}
			flock($fd, LOCK_UN);
		}
	}

?>