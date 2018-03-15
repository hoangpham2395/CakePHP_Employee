<?php
App::uses('AppController', 'Controller');
/**
 * Leavedays Controller
 *
 * @property Leaveday $Leaveday
 * @property PaginatorComponent $Paginator
 */
class LeavedaysController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * month manage method
 *
 * @return void
 */
	public function month() {
		$this->loadModel("User");

		$users = $this->User->find('all', array(
			'fields' => array('User.id', 'User.fullname'),
			'conditions' => array('User.del_flag' => 0)
		));
		$this->set('users', $users);

		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$month = date('m');
		$year = date("Y");

		if ($this->request->is('post')) {
			$dataLD = $this->request->data;
			if (isset($_POST['show_leaveday'])) {
				$month = $dataLD['leaveday_month'];
				$year = $dataLD['leaveday_year'];
			} else if (isset($_POST['thismonth_leaveday'])) {
				$month = date('m');
				$year = date("Y");
			} else if (isset($_POST['reset_leaveday'])) {
				$month = 0;
				$year = 0;
			}
		} 

		$listUser = array();
		if ($month != 0 && $year != 0) {
			// $month = 1; $year = 2017;
			$leavedays = $this->Leaveday->find('all', array(
				'conditions' => array(
					'MONTH(Leaveday.leave_datetime) =' => $month,
					'YEAR(Leaveday.leave_datetime) =' => $year,
					'Leaveday.del_flag' => 0
				)
			));
			foreach ($leavedays as $ld) {
				$fullname= isset($ld['User']['fullname']) ? $ld['User']['fullname'] : "";
				$userId = isset($ld['Leaveday']['user_id']) ? $ld['Leaveday']['user_id'] : "";
				$listUser['id-'.$userId] = array(
					'userId' => $userId,
					'fullname' => $fullname
				);
			}

			foreach ($leavedays as $ld) {
				$id = isset($ld['Leaveday']['id']) ? $ld['Leaveday']['id'] : "";
				$userId = isset($ld['Leaveday']['user_id']) ? $ld['Leaveday']['user_id'] : "";
				$date = isset($ld['Leaveday']['leave_datetime']) ? (int)date('d', strtotime($ld['Leaveday']['leave_datetime'])) : 0;
				$hour = isset($ld['Leaveday']['leave_hour']) ? $ld['Leaveday']['leave_hour'] : "";
				$reason = isset($ld['Leaveday']['leave_reason']) ? $ld['Leaveday']['leave_reason'] : "";
				foreach ($listUser as $list) {
					if ($list['id-'.$userId]['userId'] = $userId) {
						$listUser['id-'.$userId]['date-'.$date] = array(
							'id' => $id,
							'hour' => $hour,
							'reason' => $reason
						);
					}
				}
			}
			// pr($listUser);  die;
		}
		$this->set('month', $month);
		$this->set('year', $year);
		$this->set('listUser', $listUser);
	}

/**
 * add method
 *
 * @return void
 */
	public function addLeaveDay() {
		if ($this->request->is('post')) {
			$this->Leaveday->create();
			$dataALD = $this->request->data;
			$dataALD['leave_datetime'] = date('Y-m-d', strtotime($dataALD['leave_datetime']));
			if ($this->Leaveday->save($dataALD)) {
				return $this->redirect(array('controller' => 'leavedays', 'action' => 'month'));
			} else {
				echo debug($this->Leaveday->validationErrors); die;
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
	public function editLeaveDay($id) {
		if (!$this->Leaveday->exists($id)) {
			throw new NotFoundException(__('Invalid leaveday'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->Leaveday->read(null, $id);
			$this->Leaveday->set(array(
				'leave_hour' => $this->request->data['leave_hour'],
				'leave_reason' => $this->request->data['leave_reason']
			));
			if ($this->Leaveday->save()) {
				return $this->redirect(array('action' => 'month'));
			} else {
				echo debug($this->Leaveday->validationErrors); die;
			}
		}
	}

}
