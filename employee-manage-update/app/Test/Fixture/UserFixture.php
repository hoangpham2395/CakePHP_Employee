<?php
/**
 * User Fixture
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'fullname' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'email_company' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'email_personal' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'chatwork' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'skype' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'tel' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'gender' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false, 'comment' => '0:nam; 1:nữ; 2:khác'),
		'birthday' => array('type' => 'date', 'null' => false, 'default' => null),
		'image' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'department' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'position' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'user_type' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'skill' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'literacy' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'contract_type' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'work_address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'status' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'bank_account' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'id_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 12, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'description' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'join_datetime' => array('type' => 'date', 'null' => false, 'default' => null),
		'exit_datetime' => array('type' => 'date', 'null' => false, 'default' => null),
		'leave_days_have' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'số ngày nghỉ cho phép'),
		'leave_days_took' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'số ngày nghỉ phép đã nghỉ'),
		'leave_days_note' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'del_flag' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false, 'comment' => '0:chưa xóa; 1:xóa'),
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
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'fullname' => 'Lorem ipsum dolor sit amet',
			'email_company' => 'Lorem ipsum dolor sit amet',
			'email_personal' => 'Lorem ipsum dolor sit amet',
			'chatwork' => 'Lorem ipsum dolor sit amet',
			'skype' => 'Lorem ipsum dolor sit amet',
			'tel' => 'Lorem ips',
			'gender' => 1,
			'birthday' => '2017-03-23',
			'image' => 'Lorem ipsum dolor sit amet',
			'department' => 'Lorem ipsum dolor sit amet',
			'position' => 'Lorem ipsum dolor sit amet',
			'user_type' => 'Lorem ipsum dolor sit amet',
			'skill' => 'Lorem ipsum dolor sit amet',
			'literacy' => 'Lorem ipsum dolor sit amet',
			'contract_type' => 'Lorem ipsum dolor sit amet',
			'work_address' => 'Lorem ipsum dolor sit amet',
			'status' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet',
			'bank_account' => 'Lorem ipsum dolor sit amet',
			'id_number' => 'Lorem ipsu',
			'description' => 'Lorem ipsum dolor sit amet',
			'join_datetime' => '2017-03-23',
			'exit_datetime' => '2017-03-23',
			'leave_days_have' => 1,
			'leave_days_took' => 1,
			'leave_days_note' => 'Lorem ipsum dolor sit amet',
			'del_flag' => 1
		),
	);

}
