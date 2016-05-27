#!/usr/bin/php
<?PHP
	if (count($argv) > 1)
	{
		$p1 = preg_replace("/\s+/", " ", trim($argv[1], " "));
		if (strlen($p1) > 0)
			echo $p1.PHP_EOL;
	}
?>