<?php
App::uses('AppModel', 'Model');
/**
 * Leaveday Model
 *
 */
class Leaveday extends AppModel {
	public $actsAs = array('Containable');
	public $useTable = "leavedays"; /*dùng để chỉ vào bảng leavedays trong CSDL*/
	public $alias = "Leaveday"; /*alias để thay thế Leaveday khi trỏ data (trong hàm beforeSave()) */

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Employee' => array(
			'className' => 'Employee',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
