<?php

class InsphareBaseCode_Collection_MutableTest extends PHPUnit_Framework_TestCase {

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

	public function testSetDataByConstructor() {
		$fixtureData = $this->fixtureData();
		$mutable = new Collection_Mutable($fixtureData);
		$data = $mutable->getData();
		$this->assertEquals($fixtureData, $data);

		foreach ($fixtureData as $key => $fixTest) {
			$this->assertEquals($mutable->get($key), $fixTest);
		}
	}

	public function testSetData() {
		$fixtureData = $this->fixtureData();
		$mutable = new Collection_Mutable();
		$mutable->setData($fixtureData);
		$data = $mutable->getData();
		$this->assertEquals($fixtureData, $data);

		foreach ($fixtureData as $key => $fixTest) {
			$this->assertEquals($mutable->get($key), $fixTest);
		}
	}

	public function testSetDataByRef() {
		$fixtureData = $this->fixtureData();
		$mutable = new Collection_Mutable();
		$mutable->setDataByRef($fixtureData);
		$data = $mutable->getData();
		$this->assertEquals($fixtureData, $data);

		foreach ($fixtureData as $key => $fixTest) {
			$this->assertEquals($mutable->get($key), $fixTest);
		}

		$mutable->set('g', 'wie günter');
		$testFixtureArray = $fixtureData;
		$testFixtureArray['g'] = 'wie günter';
		$this->assertEquals($testFixtureArray, $mutable->getData());
	}

	public function testAddData() {
		$fixtureData = array();
		$mutable = new Collection_Mutable();
		$mutable->setDataByRef($fixtureData);

		$range = range(0, 22);
		foreach ($range as &$edit) {
			$edit = 'x_' . $edit;
		}

		foreach ($range as $key => $value) {
			$mutable->set($key, $value);
		}

		$this->assertEquals($range, $mutable->getData());
	}

	public function testHas() {
		$fixtureData = $this->fixtureData();
		$mutable = new Collection_Mutable();
		$mutable->setData($fixtureData);
		$this->assertTrue($mutable->has('a'));
		$this->assertFalse($mutable->has('z'));
	}

	public function testGet() {
		$fixtureData = $this->fixtureData();
		$mutable = new Collection_Mutable();
		$mutable->setData($fixtureData);
		$this->assertEquals($mutable->get('a'), 'wie anton');
	}

	public function testGetFallback() {
		$fixtureData = $this->fixtureData();
		$mutable = new Collection_Mutable();
		$mutable->setData($fixtureData);
		$this->assertEquals($mutable->get('z', null), null);
		$this->assertEquals($mutable->get('x', -20), -20);
	}


	public function testDeleteData() {
		$fixtureData = range(0, 22);
		$cloned = $fixtureData;
		foreach ($fixtureData as &$edit) {
			$edit = 'x_' . $edit;
		}
		$mutable = new Collection_Mutable();
		$mutable->setDataByRef($fixtureData);
		$mutable->delete(2);

		$this->assertEquals($fixtureData, $mutable->getData());
		$this->assertNotEquals($cloned, $mutable->getData());
		$this->assertEquals(count($mutable->getData()), 22);
	}

}
