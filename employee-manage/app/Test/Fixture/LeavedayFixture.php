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
		'start' => array('type' => 'date', 'null' => false, 'default' => null),
		'have' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'took' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'note' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'start' => '2017-01-10',
			'have' => 1,
			'took' => 1,
			'note' => 'Lorem ipsum dolor sit amet'
		),
	);

}
