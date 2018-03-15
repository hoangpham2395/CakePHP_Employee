<?php
/**
 * Ot Fixture
 */
class OtFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'project_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'ot_datetime' => array('type' => 'date', 'null' => false, 'default' => null, 'comment' => 'ngày nghỉ trong dự án'),
		'ot_hour' => array('type' => 'date', 'null' => false, 'default' => null, 'comment' => 'số giờ nghỉ'),
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
			'user_id' => 1,
			'ot_datetime' => '2017-03-23',
			'ot_hour' => '2017-03-23'
		),
	);

}
