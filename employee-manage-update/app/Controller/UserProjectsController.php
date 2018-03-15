<?php
App::uses('AppController', 'Controller');
/**
 * UserProjects Controller
 *
 * @property UserProject $UserProject
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UserProjectsController extends AppController {

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
		$this->UserProject->recursive = 0;
		$this->set('userProjects', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserProject->exists($id)) {
			throw new NotFoundException(__('Invalid user project'));
		}
		$options = array('conditions' => array('UserProject.' . $this->UserProject->primaryKey => $id));
		$this->set('userProject', $this->UserProject->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserProject->create();
			if ($this->UserProject->save($this->request->data)) {
				$this->Flash->success(__('The user project has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user project could not be saved. Please, try again.'));
			}
		}
		$projects = $this->UserProject->Project->find('list');
		$users = $this->UserProject->User->find('list');
		$this->set(compact('projects', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserProject->exists($id)) {
			throw new NotFoundException(__('Invalid user project'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserProject->save($this->request->data)) {
				$this->Flash->success(__('The user project has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user project could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserProject.' . $this->UserProject->primaryKey => $id));
			$this->request->data = $this->UserProject->find('first', $options);
		}
		$projects = $this->UserProject->Project->find('list');
		$users = $this->UserProject->User->find('list');
		$this->set(compact('projects', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UserProject->id = $id;
		if (!$this->UserProject->exists()) {
			throw new NotFoundException(__('Invalid user project'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UserProject->delete()) {
			$this->Flash->success(__('The user project has been deleted.'));
		} else {
			$this->Flash->error(__('The user project could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
