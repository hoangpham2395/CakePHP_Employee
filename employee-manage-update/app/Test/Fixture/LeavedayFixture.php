<?php
/**
 * Leaveday Fixture
 */
class LeavedayFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'leave_datetime' => array('type' => 'date', 'null' => false, 'default' => null, 'comment' => 'ngày tháng nghỉ'),
		'leave_hour' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'số giờ nghỉ'),
		'leave_reason' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => 'lý do nghỉ', 'charset' => 'utf8mb4'),
		'del_flag' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => '0:chưa xóa; 1:xóa'),
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
			'user_id' => 1,
			'leave_datetime' => '2017-03-23',
			'leave_hour' => 1,
			'leave_reason' => 'Lorem ipsum dolor sit amet',
			'del_flag' => 1
		),
	);

}
