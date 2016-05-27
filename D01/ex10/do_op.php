#!/usr/bin/php
<?PHP
	function do_op($i, $o, $j)
	{
		switch ($o)
		{
			case "+" :
				return ((int)$i + (int)$j);
			case "-" :
				return ((int)$i - (int)$j);
			case "*" :
				return ((int)$i * (int)$j);
			case "/" :
				return ((int)$i / (int)$j);
			case "%" :
				return ((int)$i % (int)$j);
		}
		return (null);
	}

	if (count($argv) == 4)
	{
		array_shift($argv);
		$tab = array();
		foreach ($argv as $key => $value) {
			$argv[$key] = trim($value, " \t");
		}
		$result = do_op($argv[0], $argv[1], $argv[2]);
		printf("%d\n", $result);
	}
	else
		printf("Incorrect Parameters\n");
?>