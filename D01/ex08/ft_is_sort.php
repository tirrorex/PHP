<?PHP
	function ft_is_sort($array)
	{
		$sorted = $vals = array_values($array);
   		sort($sorted);
   		return $sorted === $vals;
	}
?>