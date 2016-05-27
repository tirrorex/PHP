#!/usr/bin/php
<?PHP
	function epur_total($str)
	{
		$str = preg_replace("/\s+/", " ", trim($str, " "));
		return (explode(" ", $str));
	}

	if (count($argv) > 1)
	{
		$tab = epur_total($argv[1]);
		if (array_push($tab, array_shift($tab)))
			echo implode(" ", $tab).PHP_EOL;

	}
?>