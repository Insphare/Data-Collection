<?php

class InsphareBaseCode_Collection_LimitedTest extends PHPUnit_Framework_TestCase {

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

	public function testSetData() {
		$fixtureData = $this->fixtureData();
		$limited = new Collection_Limited(6);
		$limited->setData($fixtureData);
		$data = $limited->getData();
		$this->assertEquals($fixtureData, $data);

		foreach ($fixtureData as $key => $fixTest) {
			$this->assertEquals($limited->get($key), $fixTest);
		}
	}

	public function testSetDataByRef() {
		$fixtureData = $this->fixtureData();
		$limited = new Collection_Limited(6);
		$limited->setDataByRef($fixtureData);
		$data = $limited->getData();
		$this->assertEquals($fixtureData, $data);

		foreach ($fixtureData as $key => $fixTest) {
			$this->assertEquals($limited->get($key), $fixTest);
		}

		$limited->set('g', 'wie günter');
		$testFixtureArray = $fixtureData;
		$testFixtureArray['g'] = 'wie günter';
		$this->assertEquals($testFixtureArray, $limited->getData());
	}

	public function testAddData() {
		$fixtureData = array();
		$limited = new Collection_Limited(6);
		$limited->setDataByRef($fixtureData);

		$range = range(0, 5);
		foreach ($range as &$edit) {
			$edit = 'x_' . $edit;
		}

		foreach ($range as $key => $value) {
			$limited->set($key, $value);
		}

		$this->assertEquals($range, $limited->getData());
	}

	public function testHas() {
		$fixtureData = $this->fixtureData();
		$limited = new Collection_Limited();
		$limited->setData($fixtureData);
		$this->assertTrue($limited->has('a'));
		$this->assertFalse($limited->has('z'));
	}

	public function testGet() {
		$fixtureData = $this->fixtureData();
		$limited = new Collection_Limited(6);
		$limited->setData($fixtureData);
		$this->assertEquals($limited->get('a'), 'wie anton');
	}

	public function testGetFallback() {
		$fixtureData = $this->fixtureData();
		$limited = new Collection_Limited(6);
		$limited->setData($fixtureData);
		$this->assertEquals($limited->get('z', null), null);
		$this->assertEquals($limited->get('x', -20), -20);
	}


	public function testDeleteData() {
		$fixtureData = range(0, 5);
		$cloned = $fixtureData;
		foreach ($fixtureData as &$edit) {
			$edit = 'x_' . $edit;
		}
		$limited = new Collection_Limited(6);
		$limited->setDataByRef($fixtureData);
		$limited->delete(2);

		$this->assertEquals($fixtureData, $limited->getData());
		$this->assertNotEquals($cloned, $limited->getData());
		$this->assertEquals(count($limited->getData()), 5);
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testAddDataByRefOverLimit() {
		$fixtureData = $this->fixtureData();
		$limited = new Collection_Limited(5);
		$limited->setDataByRef($fixtureData);
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testAddDataOverLimit() {
		$fixtureData = $this->fixtureData();
		$limited = new Collection_Limited(5);
		$limited->setData($fixtureData);
	}

	public function testAddItemOverLimit() {
		$fixtureData = $this->fixtureData();
		$limited = new Collection_Limited(6);
		$limited->setData($fixtureData);
		$limited->set('kirschen', 'im sommer essen');
		$limited->set('eis', 'kühlen');
		$limited->set('leben', 'genießen');

		$this->assertEquals(
			array(
				"d"	=> "wie düsseldorf",
				"e"	=>  "wie emil",
  				"f"	=> "wie friedrich",
				"kirschen"=> "im sommer essen",
				"eis" => "kühlen",
				"leben"=> "genießen",
			),
			$limited->getData()
		);
	}

	public function testGetSize() {
		$limited = new Collection_Limited(6);
		$this->assertEquals(6, $limited->getMaxSize());
	}


}
