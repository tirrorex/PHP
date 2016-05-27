#!/usr/bin/php
<?php
	$fd = fopen("/var/run/utmpx", "r");
	if ($fd == false)
		exit ;
	date_default_timezone_set("Europe/Paris");
	$array = array();
	$user = array();
	$truc = array();
	$time = array();
	$i = 0;
	while ($line = fread($fd, 628))
	{
		$array = unpack("a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad", $line);
		if ($array['type'] == 7)
		{
			$user[$i] = $array["user"];
			$truc[$i] = $array["line"];
			$time[$i] = $array["time1"];
			$i++;
		}
	}
	sort($truc);
	sort($time);
	for ($j=0; $j < $i; $j++) { 
		printf("%s    %s  %s\n", $user[$j], $truc[$j], date("M  j H:i", $time[$j]));
	}
	fclose($fd);
?>