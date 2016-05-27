#!/usr/bin/php
<?PHP
	function epur_total($str)
	{
		$str = preg_replace("/\s+/", " ", trim($str, " "));
		return (explode(" ", $str));
	}

	if (count($argv) > 1)
	{
		array_shift($argv);
		$return = array();
		foreach ($argv as $key => $value) {
			$return = array_merge($return, epur_total($value));
		}
		if (count($return) > 0)
		{
			sort($return);
			echo implode(PHP_EOL, $return).PHP_EOL;
		}

	}
?>