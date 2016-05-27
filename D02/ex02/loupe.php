#!/usr/bin/php
<?PHP

	if (count($argv) == 2)
	{
		$str = file_get_contents($argv[1]);
		$return = preg_replace_callback("/<a href=.+>(.+)<\/a>/i", function ($tab)
		{
			return preg_replace("/$tab[1]/", strtoupper($tab[1]), $tab[0]);
		}, $str);

		$return = preg_replace_callback("/(<a href=.+>((.*)(<.*>)(.*))*<\/a>)/U", function ($tab)
		{
				$tab[0] = preg_replace("/$tab[4]/", strtolower($tab[4]), $tab[0]);
				return preg_replace("/$tab[3]/", strtoupper($tab[3]), $tab[0]);
		}, $return);

		$return = preg_replace_callback("/(.*)title=\"(.+)\"/", function ($title)
		{
			return preg_replace("/$title[2]/", strtoupper($title[2]), $title[0]);
		}, $return);
		echo $return;
	}

?>