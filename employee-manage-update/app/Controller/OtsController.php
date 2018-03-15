<?php
App::uses('AppController', 'Controller');
/**
 * Ots Controller
 *
 * @property Ot $Ot
 * @property PaginatorComponent $Paginator
 */
class OtsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->loadModel('User');
		$users = $this->User->find('all', array(
			'fields' => array('User.id', 'User.fullname'),
			'conditions' => array('User.del_flag' => 0)
		));
		$this->set('users', $users); 

		$this->loadModel('Project');
		$projects = $this->Project->find('all', array(
			'fields' => array('Project.id', 'Project.project_name'),
			'conditions' => array('Project.del_flag' => 0)
		));
		$this->set('projects', $projects);

		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$month = date('m');
		$year = date('Y');

		if ($this->request->is('post')) {
			if (isset($_POST['show_ot'])) {
				$month = $this->request->data['ot_month'];
				$year = $this->request->data['ot_year'];
			} else if (isset($_POST['thismonth_ot'])) {
				$month = date('m');
				$year = date('Y');
			} else if (isset($_POST['reset_ot'])) {
				$month = 0;
				$year = 0;
			}
		}

		$listOT = array();
		if ($month != 0 && $year != 0) {
			$month = 2; $year = 2017;
			$ots = $this->Ot->find('all', array(
				'fields' => array('Ot.id', 'Ot.user_id', 'User.fullname', 'Ot.project_id', 'Project.project_name', 'Ot.ot_datetime', 'Ot.ot_hour'),
				'conditions' => array(
					'MONTH(Ot.ot_datetime) = ' => $month,
					'YEAR(Ot.ot_datetime) = ' => $year,
					'Ot.del_flag' => 0
				)
			));

			foreach ($ots as $ot) {
				$user_id = (isset($ot['Ot']['user_id'])) ? $ot['Ot']['user_id'] : 0;
				$project_id = (isset($ot['Ot']['project_id'])) ? $ot['Ot']['project_id'] : 0;
				$fullname = (isset($ot['User']['fullname'])) ? $ot['User']['fullname'] : 0;
				$project_name = (isset($ot['Project']['project_name'])) ? $ot['Project']['project_name'] : 0;
				$listOT[$user_id.'-'.$project_id] = array(
					'userId' => $user_id,
					'projectId' => $project_id,
					'fullname' => $fullname,
					'project_name' => $project_name
				);
			}
			
			foreach ($ots as $ot) {
				$id = (isset($ot['Ot']['id'])) ? $ot['Ot']['id'] : 0;
				$user_id = (isset($ot['Ot']['user_id'])) ? $ot['Ot']['user_id'] : 0;
				$project_id = (isset($ot['Ot']['project_id'])) ? $ot['Ot']['project_id'] : 0;
				$day = (isset($ot['Ot']['ot_datetime'])) ? (int)date('d', strtotime($ot['Ot']['ot_datetime'])) : 0;
				$hour = (isset($ot['Ot']['ot_hour'])) ? $ot['Ot']['ot_hour'] : 0;
				if (!empty($listOT[$user_id.'-'.$project_id])) {
					$listOT[$user_id.'-'.$project_id]['date-'.$day] = array(
						'id' => $id,
						'hour' => $hour
					); 
				} 
			}

			// pr($listOT); die;
		}

		$this->set('month', $month);
		$this->set('year', $year);
		$this->set('listOT', $listOT);
	}

/**
 * add method
 *
 * @return void
 */
	public function addOT() {
		if ($this->request->is('post')) {
			$this->Ot->create();
			$this->request->data['ot_datetime'] = date('Y-m-d', strtotime($this->request->data['ot_datetime']));
			if ($this->Ot->save($this->request->data)) {
				return $this->redirect(array('action' => 'index'));
			} else {
				echo debug($this->Ot->validationErrors); die;
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
	public function editOT($id) {
		if (!$this->Ot->exists($id)) {
			throw new NotFoundException(__('Invalid ot'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->Ot->read(null, $id);
			$this->Ot->set(array('ot_hour' => $this->request->data['ot_hour']));
			if ($this->Ot->save()) {
				return $this->redirect(array('action' => 'index'));
			} else {
				echo debug($this->Ot->validationErrors); die;
			}
		}
	}

}
