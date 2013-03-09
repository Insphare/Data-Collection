<?php

/**
 * Implementiert eine Collection_Mutable welche auf das $maxSize limitiert ist.
 * Wenn das Limit erreicht ist wird das erste Element gelöscht.
 * Das Prinzip ähnelt dem FIFO Verfahren der Speicherung mit schlüssel zugriff.
 *
 */
class Collection_Limited extends Collection_Mutable {

	const DEFAULT_SIZE = 1000;

	/**
	 * @var int
	 */
	private $size = self::DEFAULT_SIZE;

	/**
	 * @param int $maxSize
	 * @param array $data
	 */
	public function __construct($maxSize = self::DEFAULT_SIZE) {
		$this->size = $maxSize;
	}

	/**
	 * Setzt key + value
	 *
	 * @param  $key
	 * @param  $value
	 */
	public function set($key, $value) {
		while (count($this->data) > $this->size - 1) {
			array_shift($this->data);
		}

		$this->data[(string)$key] = $value;

		return $this;
	}

	/**
	 * Setzt die daten.
	 *
	 * @param array $data
	 */
	public function setData(array $data) {
		if (count($data) > $this->size) {
			throw new \InvalidArgumentException('Data too large. Max. ' . $this->size . ' keys allowed');
		}

		parent::setData($data);
	}

	/**
	 * Setzt die daten.
	 *
	 * @param array $data
	 */
	public function setDataByRef(array &$data) {
		if (count($data) > $this->size) {
			throw new \InvalidArgumentException('Data too large. Max. ' . $this->size . ' keys allowed');
		}

		return parent::setDataByRef($data);
	}

	/**
	 * @return int
	 */
	public function getMaxSize() {
		return $this->size;
	}

}