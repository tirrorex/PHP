<?php

Class UnholyFactory {

	private $_classes;

	public function __construct() {
		$this->_classes = array();
	}


	public function absorb($f) {
		if (get_parent_class($f) == "Fighter")
		{
			$bool = 0;
			foreach ($this->_classes as $key => $value) {
				if ($value == $f->class)
				{
					$bool = 1;
					break;
				}
			}
			if ($bool)
				echo "(Factory already absorbed a fighter of type ".$f->class.")".PHP_EOL;
			else
			{
				$this->_classes[$f->class] = get_class($f);
				echo "(Factory absorbed a fighter of type ".$f->class.")".PHP_EOL;
			}
		}
		else
		{
			echo "(Factory can't absorb this, it's not a fighter)".PHP_EOL;
		}
	}

	public function fabricate($f) {
		if (array_key_exists($f, $this->_classes))
		{
			$tmp = new $this->_classes[$f];
			$this->_classes[] = $tmp;
			print("(Factory fabricates a fighter of type $f)\n");
			return ($tmp);
		}

		echo "hasn't absorbed any fighter of type ".$f.')'.PHP_EOL;
		return null;		
	}
}
?>