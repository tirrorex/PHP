#!/usr/bin/php
<?PHP
	while (42)
	{
		echo "Entrez un nombre: ";
		$handle = new SplFileObject('php://stdin');
		$line = $handle->current();
		if (!$line)
			exit(PHP_EOL);
		$result = str_replace("\n", "", $line);
		if (!is_numeric($result))
		{
			echo "'" . $result . "' n'est pas un chiffre\n";
		}
		else
		{
			if ($result % 2 == 0)
				echo "Le chiffre " . $result . " est Pair\n";
			else
				echo "Le chiffre " . $result . " est Impair\n";
		}
	}
?>
