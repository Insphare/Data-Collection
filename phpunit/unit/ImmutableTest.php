<?php

class InsphareBaseCode_Collection_ImmutableTest extends PHPUnit_Framework_TestCase {

	private function fixtureData() {
		return array(
			'a' => 'wie anton',
			'b' => 'wie berta',
			'c' => 'wie cesar',
			'd' => 'wie düsseldorf',
			'e' => 'wie emil',
			'f' => 'wie friedrich',
		);
	}

	public function testHas() {
		$fixtureData = $this->fixtureData();
		$mutable = new Collection_Immutable($fixtureData);
		$this->assertTrue($mutable->has('a'));
		$this->assertFalse($mutable->has('z'));
	}

	public function testGet() {
		$fixtureData = $this->fixtureData();
		$mutable = new Collection_Immutable($fixtureData);
		$this->assertEquals($mutable->get('a'), 'wie anton');
	}

	public function testGetFallback() {
		$fixtureData = $this->fixtureData();
		$mutable = new Collection_Immutable($fixtureData);
		$this->assertEquals($mutable->get('z', null), null);
		$this->assertEquals($mutable->get('x', -20), -20);
	}

	public function testGetData() {
		$fixtureData = $this->fixtureData();
		$mutable = new Collection_Immutable($fixtureData);
		$data = $mutable->getData();
		$this->assertEquals($fixtureData, $data);
	}


}