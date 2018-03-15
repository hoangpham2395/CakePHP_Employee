<?php
/**
 * EmployeeProject Fixture
 */
class EmployeeProjectFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'employee_project';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'project_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'employee_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'join_status' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false, 'comment' => '1:leader; 0:employee'),
		'del_flag' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'project_id' => 1,
			'employee_id' => 1,
			'join_status' => 1,
			'del_flag' => 1
		),
	);

}
