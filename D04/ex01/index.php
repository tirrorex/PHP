<?php
		session_start();
?>
<html><body>
<?php
	if (isset($_GET['login']) && isset($_GET['passwd']) && isset($_GET['submit']) == "OK")
	{
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
?>
<form action="index.php" method="GET">
	Identifiant: <input type="text" name="login" value="<?= $_SESSION['login']?>" />
	<br />
	Mot de passe: <input type="text" name="passwd" value="<?= $_SESSION['passwd']?>" />
	<input type="submit" name="submit" value="OK" />
</form>
</body></html>