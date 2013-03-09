<?php

class Collection_Mutable extends Collection_Immutable implements Collection_Mutable_Interface {

	/**
	 * Löscht einen Wert im Array anhand des keys
	 *
	 * @param  $key
	 */
	public function delete($key) {
		unset($this->data[(string)$key]);

		return $this;
	}

	/**
	 * Setzt key + value
	 *
	 * @param  $key
	 * @param  $value
	 */
	public function set($key, $value) {
		$this->data[(string)$key] = $value;

		return $this;
	}

	/**
	 * Setzt Daten
	 *
	 * @param array $data
	 */
	public function setData(array $data) {
		$this->data = $data;

		return $this;
	}

	/**
	 * Setzt Daten bei Referenz.
	 *
	 * @param array $data
	 */
	public function setDataByRef(array &$data) {
		$this->data = & $data;

		return $this;
	}
}
