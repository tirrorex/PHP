<?php
	Class NightsWatch {

	private $_member = array();

	public function recruit($var) {
		if (is_a($var, 'IFighter'))
			$this->_member[] = $var;
	}

	public function fight() {
		foreach ($this->_member as $value) {
			$value->fight();
		}
	}
}
?>