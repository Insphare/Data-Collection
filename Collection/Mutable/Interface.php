<?php

interface Collection_Mutable_Interface {

	/**
	 * Löscht den Wert anhand eines Array-Schlüssels.
	 *
	 * @param  $key
	 * @return Mutable_Interface
	 */
	public function delete($key);

	/**
	 * Setzt key + value
	 *
	 * @param  $key
	 * @param  $value
	 * @return Mutable_Interface
	 */
	public function set($key, $value);

	/**
	 * Setzt Daten
	 *
	 * @param array $data
	 * @return Mutable_Interface
	 */
	public function setData(array $data);

	/**
	 * Setzt Daten bei Referenz.
	 *
	 * @param array $data
	 * @return Mutable_Interface
	 */
	public function setDataByRef(array &$data);
}