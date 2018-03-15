<?php
App::uses('AppModel', 'Model');
/**
 * Project Model
 *
 * @property User $User
 * @property Ot $Ot
 * @property UserProject $UserProject
 */
class Project extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $actsAs = array('Containable');
	public $useTable = "projects"; /*dùng để chỉ vào bảng users trong CSDL*/
	public $alias = "Project"; /*alias để thay thế User khi trỏ data (trong hàm beforeSave()) */

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Ot' => array(
			'className' => 'Ot',
			'foreignKey' => 'project_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'UserProject' => array(
			'className' => 'UserProject',
			'foreignKey' => 'project_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
