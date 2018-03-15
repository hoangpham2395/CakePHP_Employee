<?php
/**
 * Project Fixture
 */
class ProjectFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'project_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'project_status' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => 'trạng thái dự án', 'charset' => 'utf8mb4'),
		'start_datetime' => array('type' => 'date', 'null' => false, 'default' => null, 'comment' => 'ngày bắt đầu'),
		'end_datetime' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'ngày kết thúc'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'leader'),
		'project_lang' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => 'ngôn ngữ lập trình', 'charset' => 'utf8mb4'),
		'project_description' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => 'mô tả dự án', 'charset' => 'utf8mb4'),
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
			'project_name' => 'Lorem ipsum dolor sit amet',
			'project_status' => 'Lorem ipsum dolor sit amet',
			'start_datetime' => '2017-03-23',
			'end_datetime' => 1,
			'user_id' => 1,
			'project_lang' => 'Lorem ipsum dolor sit amet',
			'project_description' => 'Lorem ipsum dolor sit amet',
			'del_flag' => 1
		),
	);

}
