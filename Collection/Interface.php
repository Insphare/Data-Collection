<?php

interface Collection_Interface {

	/**
	 * Prüft ob ein Key gesetzt ist.
	 *
	 * @param  $key
	 */
	public function has($key);

	/**
	 * Liefert ein Wert anhand vom Key zurück und $defaultValue falls der Key nicht gesetzt ist.
	 *
	 * @param string $key
	 * @param mixed $defaultValue
	 * @return mixed
	 */
	public function get($key, $defaultValue = null);

	/**
	 * Liefert die Daten zurück.
	 *
	 * @return array
	 */
	public function getData();
}