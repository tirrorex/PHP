#!/usr/bin/php
<?PHP
		$str = preg_replace("/\s+/", " ", trim($argv[1], " "));
		echo $str.PHP_EOL;
?>