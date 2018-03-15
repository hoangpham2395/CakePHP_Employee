<?php
/**
 * Ot Fixture
 */
class OtFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'ot';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'employee_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'ot_datetime' => array('type' => 'date', 'null' => false, 'default' => null),
		'ot_hour' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'employee_id' => 1,
			'ot_datetime' => '2017-01-13',
			'ot_hour' => 1
		),
	);

}
