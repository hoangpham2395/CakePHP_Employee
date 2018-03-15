<?php
App::uses('AppController', 'Controller');
/**
 * EmployeeProjects Controller
 *
 * @property EmployeeProject $EmployeeProject
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class EmployeeProjectsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		
		//load model Project
		$this->loadModel('Project');
		$projects = $this->Project->find('all', array(
			'fields' => array(
				'Project.id', 'Project.name','Project.project_lang', 'Employee.fullname',
				'Project.start_datetime', 'Project.end_datetime', 'Project.project_status'
			),
			'conditions' => array(
				'Project.del_flag' => 0
			),
			'join' => array(
				'table' => 'employee',
				'alias' => 'Employee',
				'type' => 'left',
				'conditions' => array(
					'Project.leader_id' => 'Employee.id'
				)
			)
		));
		$this->set('projects', $projects);

		//index
		$members = $this->EmployeeProject->find('all', array(
			'fields' => array(
				'EmployeeProject.id', 'EmployeeProject.project_id', 'EmployeeProject.employee_id', 
				'Employee.fullname', 'EmployeeProject.employee_type', 'EmployeeProject.join_status'
			),
			'conditions' => array(
				'EmployeeProject.del_flag' => 0
			)
		));
		$this->set('members', $members);

		//search project member
		if ($this->request->is('post')) {
			$dataSearch = $this->request->data;
			$projectId = (!empty($dataSearch['project_id'])) ? array('Project.id' => $dataSearch['project_id']) : array();
			$projects = $this->Project->find('all', array(
				'fields' => array(
					'Project.id', 'Project.name','Project.project_lang', 'Employee.fullname',
					'Project.start_datetime', 'Project.end_datetime', 'Project.project_status'
				),
				'conditions' => array(
					'Project.del_flag' => 0,
					$projectId
				),
				'join' => array(
					'table' => 'employee',
					'alias' => 'Employee',
					'type' => 'left',
					'conditions' => array(
						'Project.leader_id' => 'Employee.id'
					)
				)
			));
			$this->set('projects', $projects); 
			$project_id = (!empty($dataSearch['project_id'])) ? array('EmployeeProject.project_id' => $dataSearch['project_id']) : array();
			$members = $this->EmployeeProject->find('all', array(
				'fields' => array(
					'EmployeeProject.id', 'EmployeeProject.project_id', 'EmployeeProject.employee_type',
					'EmployeeProject.employee_id', 'Employee.fullname', 'EmployeeProject.join_status'
				),
				'conditions' => array(
					'EmployeeProject.del_flag' => 0, 
					$project_id
				)
			));
			$this->set('members', $members);
		}

		//Show error
		if ($this->request->is('get')) {
			$notice = array();
			if ($this->Session->check('noticeMember')) {
				$notice['edit'] = $this->Session->read('noticeMember.edit');
				$notice['add'] = $this->Session->read('noticeMember.add');
				$this->set('notice', $notice);
				$this->Session->delete('noticeMember');
			}
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EmployeeProject->exists($id)) {
			throw new NotFoundException(__('Invalid employee project'));
		}
		$options = array('conditions' => array('EmployeeProject.' . $this->EmployeeProject->primaryKey => $id));
		$this->set('employeeProject', $this->EmployeeProject->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->Session->check('editProMem')) {
			$this->Session->delete('editProMem');
		}

		//load model Project
		$this->loadModel('Project');
		$projects = $this->Project->find('all', array(
			'fields' => array('Project.id', 'Project.name'),
			'conditions' => array(
				'Project.del_flag' => 0
			)
		));
		$this->set('projects', $projects);

		//load model Employee
		$this->loadModel('Employee');
		$employees = $this->Employee->find('all', array(
			'fields' => array('Employee.id', 'Employee.fullname'),
			'conditions' => array(
				'Employee.del_flag' => 0
			)
		));
		$this->set('employees', $employees);

		if ($this->request->is('post')) {
			$dataAdd = $this->request->data;
			$errProMem = array();

			if (!empty($dataAdd['project_id'])) {
				$this->Session->write('addProMem.project_id', $dataAdd['project_id']);
			} else {
				$errProMem['project_id'] = 'The project name field is required';
			}

			if (!empty($dataAdd['employee_id'])) {
				$this->Session->write('addProMem.employee_id', $dataAdd['employee_id']);
			} else {
				$errProMem['employee_id'] = 'The employee name field is required';
			}

			if (!empty($dataAdd['join_status'])) {
				$this->Session->write('addProMem.join_status', $dataAdd['join_status']);
			} else {
				$errProMem['join_status'] = 'The join status field is required';
			}

			if (empty($errProMem)) {
				return $this->redirect(array('controller' => 'employeeprojects', 'action' => 'confirm'));
			}
			$this->set('err', $errProMem);
		}
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->EmployeeProject->id = $id;
		if (!$this->EmployeeProject->exists($id)) {
			throw new NotFoundException(__('Invalid employee project'));
		}

		$members = $this->EmployeeProject->find('all', array(
			'fields' => array('EmployeeProject.id', 'Project.name', 'EmployeeProject.project_id', 'Employee.fullname', 'EmployeeProject.employee_id'),
			'conditions' => array(
				'EmployeeProject.project_id' => $id,
				'EmployeeProject.del_flag' => 0,
				'EmployeeProject.employee_type' => 0
			)
		));
		//pr($members); die;
		$this->set('members', $members);

		if ($this->request->is('get')) {
			if ($this->Session->check('addProMem')) {
				$this->Session->delete('addProMem');
			}
		}

		if ($this->request->is('post')) {
			$dataEdit = $this->request->data;
			$err = array();

			if (!empty($dataEdit['project_id'])) {
				$this->Session->write('editProMem.project_id', $dataEdit['project_id']);
			}

			if (!empty($dataEdit['employee_id'])) {
				$this->Session->write('editProMem.employee_id', $dataEdit['employee_id']);
			} else {
				$err['employee'] = 'The employee name field is required';
			}

			if (!empty($dataEdit['join_status'])) {
				$this->Session->write('editProMem.join_status', $dataEdit['join_status']);
			} else {
				$err['employee'] = 'The join status field is required';
			}

			if (empty($err)) {
				return $this->redirect(array('controller' => 'employeeprojects', 'action' => 'confirm'));
			}

			$this->set('err', $err);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EmployeeProject->id = $id;
		if (!$this->EmployeeProject->exists()) {
			throw new NotFoundException(__('Invalid employee project'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EmployeeProject->delete()) {
			$this->Flash->success(__('The employee project has been deleted.'));
		} else {
			$this->Flash->error(__('The employee project could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function confirm() {

		// show name
		if ($this->Session->check('addProMem')) {
			//show project name
			$this->loadModel('Project');
			$projects = $this->Project->find('first', array(
				'fields' => array('Project.id', 'Project.name'),
				'conditions' => array(
					'Project.del_flag' => 0,
					'Project.id' => $this->Session->read('addProMem.project_id')
				)
			));
			$this->set('projects', $projects);

			//show employee fullname
			$this->loadModel('Employee');
			$employees = $this->Employee->find('first', array(
				'fields' => array('Employee.id', 'Employee.fullname'),
				'conditions' => array(
					'Employee.del_flag' => 0,
					'Employee.id' => $this->Session->read('addProMem.employee_id')
				)
			));
			$this->set('employees', $employees);

			// confirm add project member
			if ($this->request->is('post')) {
				$this->EmployeeProject->create;
				if ($this->EmployeeProject->save($this->request->data)) {
					$this->Session->write('noticeMember.add', 'Add member <span style="color: red;">'.$employees['Employee']['fullname'].'</span> in project <span style="color: red;">'.$projects['Project']['name'].'</span> success');
					return $this->redirect(array('controller' => 'employeeprojects', 'action' => 'index'));
				}
			}
		} else if ($this->Session->check('editProMem')) {
			$member = $this->EmployeeProject->find('first', array(
				'fields' => array('EmployeeProject.id', 'Project.name', 'Employee.fullname'),
				'conditions' => array(
					'EmployeeProject.project_id' => $this->Session->read('editProMem.project_id'),
					'EmployeeProject.employee_id' => $this->Session->read('editProMem.employee_id'),
					'EmployeeProject.del_flag' => 0
				)
			));
			$this->set('member', $member);

			if ($this->request->is('post')) {
				//$this->request->id = $id;
				if ($this->EmployeeProject->save($this->request->data)) {
					$this->Session->write('noticeMember.edit', 'Edit member <span style="color: red;">'.$member['Employee']['fullname'].'</span> in project <span style="color: red;">'.$member['Project']['name'].'</span> success');
					return $this->redirect(array('controller' => 'employeeprojects', 'action' => 'index'));
				}
			}
		}

	}
}
