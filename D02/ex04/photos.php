#!/usr/bin/php
<?PHP
	function get_data($str)
	{
		$c = curl_init($str);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		$data = curl_exec($c);
		curl_close($c);
		return ($data);
	}

	if (count($argv) == 2)
	{
		$data = get_data($argv[1]);
		if (preg_match("/<img src=\"(.+)\".+/U", $data, $match))
		{
			$dir = preg_replace("/http\:\/\//", "", $argv[1]);
			mkdir($dir);
			$data = file_get_contents($match[1]);
			if (!($fd = fopen($dir."/".basename($match[1]), 'w')))
				return ;
			fwrite($fd, $data);
			fclose($fd);
		}
	}
?>