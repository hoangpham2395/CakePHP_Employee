<?php
App::uses('AppController', 'Controller');
/**
 * Ots Controller
 *
 * @property Ot $Ot
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OtsController extends AppController {

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
		if (isset($_POST['showOT'])) {
			$dataOT = $this->request->data;
			$month = (int)$dataOT['ot_month'];
			$year = $dataOT['ot_year'];
		} else {
			$month = (int)date('m');
			$year = date('Y');
		}
		$otTime['month'] = $month;
		$otTime['year'] = $year;
		$this->set('otTime', $otTime);

		$ots = $this->Ot->find('all', array(
			'fields' => array('Ot.id','Ot.project_id', 'Ot.employee_id', 'Ot.ot_datetime', 'Ot.ot_hour','Project.name', 'Employee.fullname'),
			'conditions' => array(
				'month(Ot.ot_datetime)' => $month,
				'year(Ot.ot_datetime)' => $year
			)
		));
		$this->set('ots', $ots);

		// load model Employee
		$this->loadModel('Employee');
		$employees = $this->Employee->find('all', array(
			'fields' => array('Employee.id', 'Employee.fullname'),
			'conditions' => array(
				'Employee.del_flag' => 0
			)
		));
		$this->set('employees', $employees);

		//load model Project
		$this->loadModel('Project');
		$projects = $this->Project->find('all', array(
			'fields' => array('Project.id', 'Project.name'),
			'conditions' => array(
				'Project.del_flag' => 0
			)
		));
		$this->set('projects', $projects);

		//add OT
		if (isset($_POST['addOT'])) {
			$this->request->data['Ot']['project_id'] = $this->request->data['project_id'];
			$this->request->data['Ot']['employee_id'] = $this->request->data['employee_id'];
			$this->request->data['Ot']['ot_datetime'] = date('Y-m-d',strtotime($this->request->data['ot_datetime']));
			$this->request->data['Ot']['ot_hour'] = $this->request->data['ot_hour'];
			if ($this->Ot->save($this->request->data)) {
				return $this->redirect(array('controller'=>'ots', 'action'=>'index'));
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
		if (!$this->Ot->exists($id)) {
			throw new NotFoundException(__('Invalid ot'));
		}
		$options = array('conditions' => array('Ot.' . $this->Ot->primaryKey => $id));
		$this->set('ot', $this->Ot->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ot->create();
			if ($this->Ot->save($this->request->data)) {
				$this->Flash->success(__('The ot has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The ot could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Ot->Employee->find('list');
		$this->set(compact('employees'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ot->exists($id)) {
			throw new NotFoundException(__('Invalid ot'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ot->save($this->request->data)) {
				$this->Flash->success(__('The ot has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The ot could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ot.' . $this->Ot->primaryKey => $id));
			$this->request->data = $this->Ot->find('first', $options);
		}
		$employees = $this->Ot->Employee->find('list');
		$this->set(compact('employees'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ot->id = $id;
		if (!$this->Ot->exists()) {
			throw new NotFoundException(__('Invalid ot'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ot->delete()) {
			$this->Flash->success(__('The ot has been deleted.'));
		} else {
			$this->Flash->error(__('The ot could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
