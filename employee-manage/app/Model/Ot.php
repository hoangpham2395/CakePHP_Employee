<?php
App::uses('AppModel', 'Model');
/**
 * Ot Model
 *
 * @property Employee $Employee
 */
class Ot extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $actsAs = array('Containable');
	public $useTable = "ot"; /*dùng để chỉ vào bảng ot trong CSDL*/
	public $alias = "Ot"; /*alias để thay thế Leaveday khi trỏ data (trong hàm beforeSave()) */


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'employee_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ot_datetime' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ot_hour' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

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
		),

		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id'
		)
	);
}
