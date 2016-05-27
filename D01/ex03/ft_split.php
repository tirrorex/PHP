<?PHP
function ft_split($p1)
{
	$p2 = array();
	$p3 = array();
	$p2 = explode(" ", $p1);
	foreach ($p2 as $value)
	{
		if ($value != "")
			array_push($p3, $value);
	}
	sort($p3);
	return $p3;
}
?>
