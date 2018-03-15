<?php
App::uses('Leaveday', 'Model');

/**
 * Leaveday Test Case
 */
class LeavedayTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.leaveday'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Leaveday = ClassRegistry::init('Leaveday');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Leaveday);

		parent::tearDown();
	}

}
