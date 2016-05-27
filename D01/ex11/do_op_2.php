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

	if (count($argv) == 2)
	{
		$str = preg_replace("/\s+/", "", trim($argv[1], " "));
		if (preg_match("/^\d+[\*\%\/\-\+]\d+/", $str))
		{
			$i = 0;
			while (ctype_digit($str[$i]))
			{
				$arg1[$i] = $str[$i];
				$i++;
			}
			$arg1 = implode($arg1);
			$k = $i;
			$j = 0;
			$k++;
			while (ctype_digit($str[$k]))
			{
				$arg2[$j] = $str[$k];
				$j++;
				$k++;
			}
			$arg2 = implode($arg2);
			$result = do_op($arg1, $str[$i], $arg2);
			printf("%d\n", $result);
		}
		else
			printf("Syntax Error\n");
	}
	else
		printf("Incorrect Parameters\n");
?>