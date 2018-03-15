<?php
App::uses('AppModel', 'Model');
/**
 * Employee Model
 *
 */
class Employee extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $actsAs = array('Containable');
	public $useTable = "employee"; /*dùng để chỉ vào bảng employee trong CSDL*/
	public $alias = "Employee"; /*alias để thay thế Employee khi trỏ data (trong hàm beforeSave()) */

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Leaveday' => array(
			'className' => 'Leaveday',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * Validation rules
 *
 * @var array
 */
	// public function validateLogin() {
	// 	$this->validate = array(
	// 		'username' => array(
	// 			'rule1' => array(
	// 				'rule' => array('notBlank'),
	// 				'message' => 'The username field is requied'
	// 			),

	// 			'rule2' => array(
	// 				'rule' => array('lengthBetween', 3,10),
	// 				'message' => 'The username is not correct'
	// 			),

	// 			'rule3' => array(
	// 				'rule' => '/^[a-zA-Z0-9_]{3,10}$/i',  chỉ cho phép chữ thường, chữ hoa, số, từ 3 đến 10 ký tự
	// 				'message' => 'The username is not correct' 
	// 			)
	// 		),

	// 		'password' => array(
	// 			'rule1' => array(
	// 				'rule' => array('notBlank'),
	// 				'message' => 'The username field is requied'
	// 			),

	// 			'rule2' => array(
	// 				'rule' => array('lengthBetween', 3,10),
	// 				'message' => 'The username is not correct'
	// 			)
	// 		)
	// 	)
	// 	return $this->validates($this->validate);
	// }

	// Mã hóa password khi dùng Auth
	// public function beforeSave($option = array()) {
	// 	// hash our password
	// 	if (isset($this->data[$this->alias]['password'])) {
 //            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
 //        }

	// 	// fallback to our parent
	// 	return parent::beforeSave($option);
	// }

}
