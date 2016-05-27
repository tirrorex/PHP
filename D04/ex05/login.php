<?php
	include ('auth.php');
	session_start();
	if (isset($_POST['login']) && isset($_POST['passwd']))
	{			
		if (auth($_POST['login'], $_POST['passwd']))
		{
			$_SESSION['loggued_on_user'] = $_POST['login'];
?>
<iframe name="chat" height="550px" width="100%" src="chat.php"></iframe>
<iframe height="50px" width="100%" src="speak.php"></iframe>
<?php
		}
		else
		{
			$_SESSION['loggued_on_user'] = "";
			echo "ERROR\n";
		}
	}
	else
	{
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
	}
?>