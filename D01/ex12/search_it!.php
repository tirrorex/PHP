#!/usr/bin/php
<?PHP
	if (count($argv) > 2)
	{
		$search = $argv[1];
		$tab = array();
		foreach ($argv as $key => $value) {
			if ($key > 1)
				array_push($tab, $value);
		}
		foreach ($tab as $key => $value) {
			$str = explode(":", $value);
			if ($str[0] == $search)
				$return = $str[1];
		}
		echo $return.PHP_EOL;
	}
?>