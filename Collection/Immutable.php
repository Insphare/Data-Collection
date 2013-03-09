<?php

class Collection_Immutable implements Collection_Interface {

	/**
	 * @var array
	 */
	protected $data = array();

	/**
	 * @param array $data
	 */
	public function __construct(array $data = array()) {
		$this->data = $data;
	}

	/**
	 * Prüft ob ein Key existiert.
	 *
	 * @param  $key
	 */
	public function has($key) {
		return isset($this->data[$key]);
	}

	/**
	 * Liefert den Schlüssel zurück, return $fallback wenn nicht gesetzt.
	 *
	 * @param $key
	 * @param null $fallback
	 * @return null
	 */
	public function get($key, $fallback = null) {
		$key = (string)$key;

		if (!isset($this->data[$key])) {
			return $fallback;
		}

		return $this->data[$key];
	}

	/**
	 * Liefert die Daten zurück.
	 *
	 * @return array
	 */
	public function getData() {
		return $this->data;
	}
}
