<?php
	function get_tab()
	{
		if (!file_exists('../private/chat'))
			return (array());
		$return = file_get_contents('../private/chat');
		$return = unserialize($return);
		return ($return);
	}
	$msg_send = FALSE;

	session_start();
	if ($_SESSION['loggued_on_user'] != "")
	{
		if (isset($_POST['msg']))
		{
			$fd = fopen('../private/chat', 'a+');
			if ($fd)
				flock($fd, LOCK_EX);
			date_default_timezone_set("Europe/Paris");
			$tab = get_tab();
			$tab[] = array('login' => $_SESSION['loggued_on_user'], "time" => time(), "msg" => $_POST['msg']);
			if (!file_exists('../private'))
			mkdir('../private');
			file_put_contents('../private/chat', serialize($tab));
			 if ($fd)
			 	flock($fd, LOCK_UN);
			$msg_send = TRUE;
		}
?>
<html>
	<head>
<?php if ($msg_send) { ?>
		<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
<?php } ?>
	</head>
	<body>
<form action="speak.php" method="POST">
	Message: <input type="text" name="msg" placeholder="Message" autofocus/>
	<input type="submit" name="submit" value="OK"/>
</form>
</body></html>
<?php
	}
	else
		echo "ERROR\n";

?>
