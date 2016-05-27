#!/usr/bin/php
<?PHP
	
	function sortbychar($s1, $s2)
	{
		if ($s1 === $s2)
			return (0);
		elseif (ctype_alpha($s1))
		{
			if (ctype_alpha($s2))
				return (strcmp($s1, $s2));
			else
				return (-1);
		}
		elseif (ctype_alpha($s2))
		{
			if (ctype_alpha($s1))
				return (strcmp($s1, $s2));
			else
				return (1);
		}
		elseif (ctype_digit($s1))
		{
			if (ctype_digit($s2))
				return (strcmp($s1, $s2));
			else
				return (-1);
		}
		elseif (ctype_digit($s2))
		{
			if (ctype_digit($s1))
				return (strcmp($s1, $s2));
			else
				return (1);
		}
		return (strcmp($s1, $s2));
	}

	function mysortfunc($s1, $s2)
	{
		$s1 = strtolower($s1);
		$s2 = strtolower($s2);
		if ($s1 === $s2)
			return (0);
		$len1 = strlen($s1);
		$len2 = strlen($s2);
		$len = max($len1, $len2);
		for ($i=0; $i < $len; $i++)
		{ 
				$result = sortbychar($s1[$i], $s2[$i]);
				if ($result != 0)
					return ($result);
		}
	}

	function epur_total($str)
	{
		$str = preg_replace("/\s+/", " ", trim($str, " "));
		return (explode(" ", $str));
	}

	if (count($argv) > 1)
	{
		array_shift($argv);
		$tab = array();
		foreach ($argv as $key => $value) {
			$tab = array_merge($tab, epur_total($value));
		}
		if (count($tab) > 0)
		{
			usort($tab, "mysortfunc");
		}
		foreach ($tab as $key => $value) {
			echo $value.PHP_EOL;
		}
	}
?>