<?php
App::uses('Ot', 'Model');

/**
 * Ot Test Case
 */
class OtTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ot',
		'app.employee'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ot = ClassRegistry::init('Ot');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ot);

		parent::tearDown();
	}

}
