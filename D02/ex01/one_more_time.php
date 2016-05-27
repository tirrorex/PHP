#!/usr/bin/php
<?PHP
	if (count($argv) == 2)
	{
		$good = 0;
		$day = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
		$month = array("Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");
		setlocale(LC_TIME, "fr_FR");
		if (preg_match("/^[A-Z]?[a-z]+\s[0-9]{2}\s[A-Z]?[a-z]+\s\d{4}\s\d{2}:\d{2}:\d{2}$/", $argv[1]))
		{
			$array = explode(" ", preg_replace("/:/", " ", $argv[1]));
			$array[0] = ucfirst($array[0]);
			$array[2] = ucfirst($array[2]);
			foreach ($day as $key => $value) {
				if ($value === $array[0])
				{
					$good++;
					break;
				}
			}
			foreach ($month as $key => $value) {
				if ($value === $array[2])
				{
					$monthnum = $key + 1;
					$good++;
					break;
				}
			}
			if ($array[1] >= 0 && $array[1] <= 31)
				$good++;
			if ($array[4] >= 0 && $array[4] <= 24)
				$good++;
			if ($array[5] >= 0 && $array[5] <= 59)
				$good++;
			if ($array[6] >= 0 && $array[6] <= 59)
				$good++;
			if ($good == 6)
			{
				date_default_timezone_set("Europe/Paris");
				echo mktime($array[4], $array[5], $array[6], $monthnum, $array[1], $array[3]).PHP_EOL;
			}
			else
				printf("Wrong Format\n");

		}
		else
			printf("Wrong Format\n");
	}
?>