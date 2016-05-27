<?php

Class Vertex
{
	// * ATTRIBUTES ***************** //
	public static $verbose = FALSE;
	public $red;
	public $green;
	public $blue;


	// * CTORS / DTORS ************** //
	public function __construct(array $kwargs) {
		if (array_key_exists('rgb', $kwargs))
		{
			$this->red = intval(($kwargs['rgb'] >> 16) % 256);
			$this->green = intval(($kwargs['rgb'] >> 8) % 256);
			$this->blue = intval($kwargs['rgb'] % 256);
		}
		else
		{
			if (array_key_exists('red', $kwargs))
				$this->red = intval($kwargs['red']);
			else
				$this->red = 0;
			if (array_key_exists('green', $kwargs))
				$this->green = intval($kwargs['green']);
			else
				$this->red = 0;
			if (array_key_exists('blue', $kwargs))
				$this->blue = intval($kwargs['blue']);
			else
				$this->red = 0;
		}
			if (self::$verbose)
				echo $this.' constructed.'.PHP_EOL;
	}

	public function __destruct() {
		if (self::$verbose)
			echo $this.' destructed.'.PHP_EOL;
	}

	// * MEMBER FUNCTIONS / METHODS * //
	public function add(Color $var) {
		return new Color(array('red' => $this->red + $var->red,
								'green' => $this->green + $var->green,
								'blue' => $this->blue + $var->blue));
	}

	public function sub(Color $var) {
		return new Color(array('red' => $this->red - $var->red,
								'green' => $this->green - $var->green,
								'blue' => $this->blue - $var->blue));
	}

	public function mult($var) {
		return new Color(array('red' => $this->red * $var,
								'green' => $this->green * $var,
								'blue' => $this->blue * $var));
	}

	public function __tostring() {
		$str = sprintf("%s( red: %3d, green: %3d, blue: %3d )", get_called_class(), $this->red, $this->green, $this->blue);
     	return $str;
     }

     public static function doc() {
		if (file_exists(get_called_class().".doc.txt"))
			return file_get_contents(get_called_class().".doc.txt");
	}
}
?>