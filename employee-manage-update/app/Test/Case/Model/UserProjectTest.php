<?php
App::uses('UserProject', 'Model');

/**
 * UserProject Test Case
 */
class UserProjectTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_project',
		'app.project',
		'app.leader',
		'app.ot',
		'app.user',
		'app.leaveday'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserProject = ClassRegistry::init('UserProject');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserProject);

		parent::tearDown();
	}

}
