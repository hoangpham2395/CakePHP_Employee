<?php
App::uses('AppController', 'Controller');
/**
 * Leavedays Controller
 *
 * @property Leaveday $Leaveday
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class LeavedaysController extends AppController {

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
			'fields' => array('Leaveday.id', 'Leaveday.employee_id', 'Employee.fullname', 'Leaveday.leave_datetime', 'Leaveday.leave_hour', 'Leaveday.leave_reason','Leaveday.del_flag'),
			'joins' => array(
				array(						
					'table' => 'employee',
					'alias' => 'em',
					'type' => 'left',
					'conditions' => array(
						'Leaveday.employee_id' => 'em.id'
					)
				)
			),
			//'group' => 'Leaveday.employee_id'
		);
		$this->set('leavedays', $this->paginate());

		if ($this->request->is('post')) {
			if (isset($_POST['show_leave_days'])) {
				$leave['year'] = $this->request->data['leave_year'];
				$leave['month'] = $this->request->data['leave_month'];
			}
			if (isset($_POST['this_month'])) {
				$leave['year'] = date('Y');
				$leave['month'] = date('m');
			}
			if (isset($_POST['reload'])) {
				$leave['year'] = '';
				$leave['month'] = '';
			}

			$this->set('leave', $leave);
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
		if (!$this->Leaveday->exists($id)) {
			throw new NotFoundException(__('Invalid leaveday'));
		}
		$options = array('conditions' => array('Leaveday.' . $this->Leaveday->primaryKey => $id));
		$this->set('leaveday', $this->Leaveday->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			//echo 'hello'; die;				
			$this->Leaveday->create();
			if ($this->Leaveday->save($this->request->data)) {
				//$this->Session->write('notice.add','Add success');
				return $this->redirect(array('controller' => 'employees', 'action' => 'monthly_manage'));
			} else {
				//	$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
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
		if (!$this->Leaveday->exists($id)) {
			throw new NotFoundException(__('Invalid leaveday'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Leaveday->save($this->request->data)) {
				$this->Flash->success(__('The leaveday has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The leaveday could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Leaveday.' . $this->Leaveday->primaryKey => $id));
			$this->request->data = $this->Leaveday->find('first', $options);
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
		$this->Leaveday->id = $id;
		if (!$this->Leaveday->exists()) {
			throw new NotFoundException(__('Invalid leaveday'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Leaveday->delete()) {
			$this->Flash->success(__('The leaveday has been deleted.'));
		} else {
			$this->Flash->error(__('The leaveday could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function show() {
		$employees = $this->Leaveday->find('all', array(
			'fields' => array('Leaveday.id', 'Leaveday.employee_id', 'Employee.fullname', 'Leaveday.start', 'Leaveday.have', 'Leaveday.took', 'Leaveday.note', 'Employee.del_flag'),
			'contain' => 'Employee',
			'Employee.del_flag' => 0
		));
		$this->set('employees', $employees);

		if ($this->request->is('post')) {
			$dataShow = $this->request->data;
			
			

			
			$this->set('month',$this->Session->write('Leaveday.month', $dataShow['leave_month']));
			$this->set($this->Session->write('Leaveday.year', $dataShow['leave_year']));
		}
	}
}
