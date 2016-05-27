<?php
	Class House {

	public function introduce() {
		echo get_class()." ".$this->getHouseName()." of ".$this->getHouseSeat()." : \"".
			$this->getHouseMotto()."\"".PHP_EOL;
	}

}
?>