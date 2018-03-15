<?php
App::uses('AppController', 'Controller');
/**
 * Projects Controller
 *
 * @property Project $Project
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ProjectsController extends AppController {

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
		$this->paginate = array(
			'fields' => array('Project.id', 'Project.name', 'Project.project_status', 'Project.start_datetime', 'Project.end_datetime', 'Project.leader_id', 'Employee.fullname', 'Project.project_lang', 'Project.del_flag'),
			'limit' => 10,
			'contain' => 'Employee',
			'conditions' => array(
				'Project.del_flag' => 0
			)
		);
		$this->set('projects', $this->paginate());

		//loadModel Employee
		$this->loadModel('Employee');
		$employees = $this->Employee->find('all', array(
			'fields' => array('Employee.id', 'Employee.fullname'),
			'conditions' => array(
				'Employee.del_flag' => 0
			)
		));
		$this->set('employees', $employees);

		/* -- Form search -- */
		if ($this->request->is('post')) {
			$dataSearch = $this->request->data;

			$projectName = (!empty($dataSearch['project_name'])) ? array('Project.name LIKE' => '%'.$dataSearch['project_name'].'%') : array();
			$status = (!empty($dataSearch['project_status'])) ? array('Project.project_status LIKE' => $dataSearch['project_status']) : array();
			$start_datetime = (!empty($dataSearch['start_datetime'])) ? array('Project.start_datetime >=' => date('Y-m-d', strtotime($dataSearch['start_datetime']))) : array();
			$lang = (!empty($dataSearch['project_lang'])) ? array('Project.project_lang LIKE' => '%'.$dataSearch['project_lang'].'%') : array();
			$leader = (!empty($dataSearch['leader_id'])) ? array('Project.leader_id LIKE' => $dataSearch['leader_id']) : array();

			$this->paginate = array(
			'fields' => array('Project.id', 'Project.name', 'Project.project_status', 'Project.start_datetime', 'Project.end_datetime', 'Project.leader_id', 'Employee.fullname', 'Project.project_lang', 'Project.del_flag'),
			'limit' => 10,
			'contain' => 'Employee',
			'conditions' => array(
				'Project.del_flag' => 0,
				$projectName,
				$status,
				$start_datetime, 
				$lang,
				$leader
			)
		);
		$this->set('projects', $this->paginate());
		}

		//Show error
		if ($this->request->is('get')) {
			$notice = array();
			if ($this->Session->check('noticePro')) {
				$notice['delete'] = $this->Session->read('noticePro.delete');
				$notice['edit'] = $this->Session->read('noticePro.edit');
				$notice['add'] = $this->Session->read('noticePro.add');
				$this->set('notice', $notice);
				$this->Session->delete('noticePro');
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
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
		$this->set('project', $this->Project->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('get')) {
			if ($this->Session->check('proEdit')) {
				$this->Session->delete('proEdit');
			}
		}

		//loadModel Employee
		$this->loadModel('Employee');
		$employees = $this->Employee->find('all', array(
			'fields' => array('Employee.id', 'Employee.fullname'),
			'conditions' => array(
				'Employee.del_flag' => 0
			)
		));
		$this->set('employees', $employees);

		$errProAdd = array();
		if ($this->request->is('post')) {
			$dataAdd = $this->request->data;

			if (!empty($dataAdd['project_name'])) {
				$this->Session->write('proAdd.project_name', $dataAdd['project_name']);
			} else {
				$errProAdd['project_name'] = "The project name field is required.";
			}

			if (!empty($dataAdd['project_status'])) {
				$this->Session->write('proAdd.project_status', $dataAdd['project_status']);
			} else {
				$errProAdd['project_status'] = "The project status field is required.";
			}

			if (!empty($dataAdd['leader_id'])) {
				$this->Session->write('proAdd.leader_id', $dataAdd['leader_id']);
			} else {
				$errProAdd['leader_name'] = "The leader name field is required.";
			}

			if (!empty($dataAdd['project_lang'])) {
				$this->Session->write('proAdd.project_lang', $dataAdd['project_lang']);
			} else {
				$errProAdd['project_lang'] = "The project language field is required.";
			}

			if (!empty($dataAdd['start_datetime'])) {
				$this->Session->write('proAdd.start_datetime', date('Y-m-d', strtotime($dataAdd['start_datetime'])));
			} else {
				$errProAdd['start_datetime'] = "The start datetime field is required.";
			}

			$endDatetime = (!empty($dataAdd['end_datetime'])) ? date('Y-m-d', strtotime($dataAdd['end_datetime'])) : '0000-00-00';
			$this->Session->write('proAdd.end_datetime', $endDatetime);

			if (!empty($dataAdd['project_description'])) {
				$this->Session->write('proAdd.project_description', $dataAdd['project_description']);
			} 

			if (empty($errProAdd)) {
				return $this->redirect(array('controller' => 'projects', 'action' => 'confirm'));
			}

			$this->set('err', $errProAdd);
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id) {
		$this->request->id = $id;
		$options = array('conditions' => array('Project.id' => $id));
		$this->set('project', $this->Project->find('first', $options));

		if ($this->request->is('get')) {
			if ($this->Session->check('proAdd')) {
				$this->Session->delete('proAdd');
			}
		}

		//loadModel Employee
		$this->loadModel('Employee');
		$employees = $this->Employee->find('all', array(
			'fields' => array('Employee.id', 'Employee.fullname'),
			'conditions' => array(
				'Employee.del_flag' => 0
			)
		));
		$this->set('employees', $employees);

		$this->Session->write('proEdit.id', $id);
		
		$errProEdit = array();
		if ($this->request->is('post')) {
			$dataEdit = $this->request->data;

			if (empty($dataEdit['name'])) {
				$errProEdit['project_name'] = "The project name field is required.";
			} else {
				$this->Session->write('proEdit.project_name', $dataEdit['name']);
			}

			if (empty($dataEdit['project_status'])) {
				$errProEdit['project_status'] = "The project status field is required.";
			} else {
				$this->Session->write('proEdit.project_status', $dataEdit['project_status']);
			}

			if (empty($dataEdit['leader_id'])) {
				$errProEdit['leader_name'] = "The leader name field is required.";
			} else {
				$this->Session->write('proEdit.leader_id', $dataEdit['leader_id']);
			}

			if (empty($dataEdit['project_lang'])) {
				$errProEdit['project_lang'] = "The project language field is required.";
			} else {
				$this->Session->write('proEdit.project_lang', $dataEdit['project_lang']);
			}

			if (empty($dataEdit['start_datetime'])) {
				$errProEdit['start_datetime'] = "The start datetime field is required.";
			} else {
				$this->Session->write('proEdit.start_datetime', date('Y-m-d', strtotime($dataEdit['start_datetime'])));
			}

			$endDatetime = (!empty($dataEdit['end_datetime'])) ? date('Y-m-d', strtotime($dataEdit['end_datetime'])) : '0000-00-00';
			$this->Session->write('proEdit.end_datetime', $endDatetime);

			if (!empty($dataEdit['project_description'])) {
				$this->Session->write('proEdit.project_description', $dataEdit['project_description']);
			}

			// show error
			$this->set('err', $errProEdit);

			// confirm edit
			if (empty($errProEdit)) {
				return $this->redirect(array('controller' => 'projects', 'action'=>'confirm'));
			} 
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id) {	

		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid employee'));		
		} 

		$project = $this->Project->find('first', array(
			'fields' => array('Project.name'),
			'conditions' => array('Project.id' => $id)
		));

		if ($this->request->is('post')) {	
			$dataSave = array('del_flag' => 1);			
			if ($this->Project->save($dataSave)){
				$this->Session->write('noticePro.delete', 'Delete <span style="color:red;">'.$project['Project']['name'].'</span> success');
			}
			$this->redirect(array('controller' => 'projects', 'action' => 'index'));
			
		}
	}


	public function confirm() {
		if ($this->Session->check('proAdd')) {
			$employeeId = $this->Session->read('proAdd.leader_id');
		} else if ($this->Session->check('proEdit')) {
			$employeeId = $this->Session->read('proEdit.leader_id');
		} 

		$this->loadModel('Employee');
		$employees = $this->Employee->find('first', array(
			'fields' => array('Employee.id', 'Employee.fullname'),
			'conditions' => array(
				'Employee.del_flag' => 0,
				'Employee.id' => $employeeId
			)
		));
		$this->set('employees', $employees);

		if ($this->Session->check('proAdd')) {
			if ($this->request->is('post')) {
				$this->Project->create();
				if ($this->Project->save($this->request->data)) {
					$this->Session->write('noticePro.add', 'Add <span style="color:red;">'.$this->Session->read('proAdd.project_name').'</span> success');
					return $this->redirect(array('controller'=>'projects', 'action'=>'index'));
				}
			}
		} else if ($this->Session->check('proEdit')) {
			if ($this->request->is('post')) {
				if ($this->Project->save($this->request->data)) {
					$this->Session->write('noticePro.edit', 'Edit <span style="color:red;">'.$this->Session->read('proEdit.project_name').'</span> success');
					return $this->redirect(array('controller'=>'projects', 'action'=>'index'));
				}
			}			
		}
	}
}
