<?php
	Class Lannister {

	public function sleepWith($var) {
		if (is_a($var, 'Lannister'))
			echo "Not even if I'm drunk !".PHP_EOL;
		else 
			echo "Let's do this.".PHP_EOL;
	}
}
?>