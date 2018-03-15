<?php
App::uses('EmployeeProject', 'Model');

/**
 * EmployeeProject Test Case
 */
class EmployeeProjectTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.employee_project',
		'app.project',
		'app.employee',
		'app.leaveday'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EmployeeProject = ClassRegistry::init('EmployeeProject');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmployeeProject);

		parent::tearDown();
	}

}
