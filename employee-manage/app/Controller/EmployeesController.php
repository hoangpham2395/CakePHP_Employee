<?php
App::uses('AppController', 'Controller');
/**
 * Employees Controller
 *
 * @property Employee $Employee
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class EmployeesController extends AppController {

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
		// $this->Employee->recursive = 0;
		// $this->set('employees', $this->Paginator->paginate());
		$this->paginate = array(
			'fields'=> array('Employee.id', 'Employee.fullname', 'Employee.email_company', 'Employee.chatwork', 'Employee.gender', 'Employee.birthday', 'Employee.department', 'Employee.position', 'Employee.employee_type', 'Employee.status', 'Employee.join_datetime', 'Employee.del_flag'),
			'limit' => 10,
			'conditions' => array(
				'Employee.del_flag' => 0
			)
		);
		$employees = $this->paginate();
		$this->set('employees', $employees);

		if ($this->request->is('post')) {
			$dataSearch = $this->request->data;

			$fullname = !empty($dataSearch['fullname']) ? array('Employee.fullname LIKE' => '%'.$dataSearch['fullname'].'%') : array();
			$email_company = !empty($dataSearch['email_company']) ? array('Employee.email_company LIKE' => '%'.$dataSearch['email_company'].'%') : array();
			$chatwork = !empty($dataSearch['chatwork']) ? array('Employee.chatwork LIKE' => '%'.$dataSearch['chatwork'].'%') : array();
			$birthday = !empty($dataSearch['birthday']) ? array('Employee.birthday LIKE' => '%'.date('Y-m-d',strtotime($dataSearch['birthday'])).'%') : array();
			$department = !empty($dataSearch['department']) ? array('Employee.department LIKE' => $dataSearch['department']) : array();
			$position = !empty($dataSearch['position']) ? array('Employee.position LIKE' => $dataSearch['position']) : array();
			$employee_type = !empty($dataSearch['employee_type']) ? array('Employee.employee_type LIKE' => $dataSearch['employee_type']) : array();
			$gender = !empty($dataSearch['gender']) ? array('Employee.gender LIKE' => $dataSearch['gender']) : array();
			$status = !empty($dataSearch['status']) ? array('Employee.status LIKE' => $dataSearch) : array();
			$join_datetime = !empty($dataSearch['join_datetime']) ? array('Employee.join_datetime >=' => date('Y-m-d',strtotime($dataSearch['join_datetime']))) : array();

			$this->paginate = array(
				'fields'=> array('Employee.id', 'Employee.fullname', 'Employee.email_company', 'Employee.chatwork', 'Employee.gender', 'Employee.birthday', 'Employee.department', 'Employee.position', 'Employee.employee_type', 'Employee.status', 'Employee.join_datetime'),
				'conditions' => array(
					$fullname,
					$email_company,
					$chatwork,
					$birthday,
					$department,
					$position,
					$employee_type,
					$gender,
					$status,
					$join_datetime
				),
				'limit' => 10
			);
			$employees = $this->paginate();
			$this->set('employees', $employees);
		}

		//Show error
		if ($this->request->is('get')) {
			$notice = array();
			if ($this->Session->check('notice')) {
				$notice['delete'] = $this->Session->read('notice.delete');
				$notice['edit'] = $this->Session->read('notice.edit');
				$notice['add'] = $this->Session->read('notice.add');
				$this->set('notice', $notice);
				$this->Session->delete('notice');
			}
		}
	}

// dashboard
	public function dashboard() {
		$count = $this->Employee->find('count', array(
			'conditions' => array(
				'Employee.del_flag' => 0
			)
		));
		$this->set('count', $count);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id) {
		// if (!$this->Employee->exists($id)) {
		// 	throw new NotFoundException(__('Invalid employee'));
		// }
		$this->request->id = $id;
		$options = array('conditions' => array('Employee.' . $this->Employee->primaryKey => $id));
		$this->set('employee', $this->Employee->find('first', $options));
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('get')) {
			if ($this->Session->check('Edit')) {
				$this->Session->delete('Edit');
			} 
		}

		if ($this->request->is('post')) {
			$dataAdd = $this->request->data;
			$errAdd = array();

			if (!empty($dataAdd['username'])) {
				$this->Session->write('Add.username', $dataAdd['username']);
			} else {
				$errAdd['username'] = "The username field is required.";
			}

			if (!empty($dataAdd['password'])) {
				$this->Session->write('Add.password', $dataAdd['password']);
			} else {
				$errAdd['password'] = "The password field is required.";
			}

			if (!empty($dataAdd['confirm_password'])) {
				if (strcmp($dataAdd['password'], $dataAdd['confirm_password']) != 0) {
					$errAdd['confirm_password'] = "Wrong confirm password";
				}
			} else {
				$errAdd['confirm_password'] = "The confirm password field is required.";
			}

			if (!empty($dataAdd['fullname'])) {
				$this->Session->write('Add.fullname', $dataAdd['fullname']);
			} else {
				$errAdd['fullname'] = "The fullname field is required.";
			}

			if (!empty($dataAdd['tel'])) {
				$this->Session->write('Add.tel', $dataAdd['tel']);
			} 

			if (!empty($dataAdd['gender'])) {
				$this->Session->write('Add.gender', $dataAdd['gender']);
			} else {
				$errAdd['gender'] = "The gender field is required.";
			}

			if (!empty($dataAdd['email_company'])) {
				$this->Session->write('Add.email_company', $dataAdd['email_company']);
			} else {
				$errAdd['email_company'] = "The email company field is required.";
			}

			if (!empty($dataAdd['email_personal'])) {
				$this->Session->write('Add.email_personal', $dataAdd['email_personal']);
			} else {
				$errAdd['email_personal'] = "The email pesonal field is required.";
			}

			if (!empty($dataAdd['skype'])) {
				$this->Session->write('Add.skype', $dataAdd['skype']);
			} 

			if (!empty($dataAdd['chatwork'])) {
				$this->Session->write('Add.chatwork', $dataAdd['chatwork']);
			} 

			if (!empty($dataAdd['join_datetime'])) {
				$this->Session->write('Add.join_datetime', date('Y-m-d', strtotime($dataAdd['join_datetime'])));
			} else {
				$errAdd['join_datetime'] = "The day started working at the company field is required.";
			}

			if (!empty($dataAdd['exit_datetime'])) {
				$this->Session->write('Add.exit_datetime', date('Y-m-d', strtotime($dataAdd['exit_datetime'])));
			} 

			if (!empty($dataAdd['birthday'])) {
				$this->Session->write('Add.birthday', date('Y-m-d', strtotime($dataAdd['birthday'])));
			} 

			if (!empty($dataAdd['department'])) {
				$this->Session->write('Add.department', $dataAdd['department']);
			} else {
				$errAdd['department'] = "The department field is required.";
			}

			if (!empty($dataAdd['position'])) {
				$this->Session->write('Add.position', $dataAdd['position']);
			} else {
				$errAdd['position'] = "The position field is required.";
			}

			if (!empty($dataAdd['employee_type'])) {
				$this->Session->write('Add.employee_type', $dataAdd['employee_type']);
			} else {
				$errAdd['employee_type'] = "The employee type field is required.";
			}

			if (!empty($dataApp['skill'])) {
				$this->Session->write('App.skill', $dataApp['skill']);
			} 

			if (!empty($dataAdd['literacy'])) {
				$this->Session->write('Add.literacy', $dataAdd['literacy']);
			} 

			if (!empty($dataAdd['contract_type'])) {
				$this->Session->write('Add.contract_type', $dataAdd['contract_type']);
			} else {
				$errAdd['contract_type'] = "The contract type field is required.";
			}

			if (!empty($dataAdd['work_address'])) {
				$this->Session->write('Add.work_address', $dataAdd['work_address']);
			} 

			if (!empty($dataAdd['status'])) {
				$this->Session->write('Add.status', $dataAdd['status']);
			} else {
				$errAdd['status'] = "The employee status field is required.";
			}

			if (!empty($dataAdd['address'])) {
				$this->Session->write('Add.address', $dataAdd['address']);
			} 

			if (!empty($dataAdd['bank_account'])) {
				$this->Session->write('Add.bank_account', $dataAdd['bank_account']);
			} 

			if (!empty($dataAdd['id_number'])) {
				$this->Session->write('Add.id_number', $dataAdd['id_number']);
			} 

			if (!empty($dataAdd['description'])) {
				$this->Session->write('Add.description', $dataAdd['description']);
			} 

			if (empty($errAdd)) {
				return $this->redirect(array('controller' => 'employees', 'action' => 'confirm'));
			}

			$this->set('err', $errAdd);
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

		$this->request->id = $id;
		$options = array('conditions' => array('Employee.id' => $id));
		$this->set('employee', $this->Employee->find('first', $options));

		if ($this->request->is('get')) {
			if ($this->Session->check('Add')) {
				$this->Session->delete('Add');
			}
		}

		if ($this->request->is('post')) {
			$dataEdit = $this->request->data;
			$err = array();

			$this->Session->write('Edit.id', $id);

			if (!empty($dataEdit['username'])) {
				$this->Session->write('Edit.username', $dataEdit['username']);
			} else {
				$err['username'] = "The username field is required.";
			}

			if (!empty($dataEdit['password'])) {
				$this->Session->write('Edit.password', $dataEdit['password']);
			} else {
				$err['password'] = "The password field is required.";
			}

			if (!empty($dataEdit['confirm_password'])) {
				if (strcmp($dataEdit['password'], $dataEdit['confirm_password']) != 0) {
					$err['confirm_password'] = "Wrong confirm-password";
				}
			} else {
				$err['confirm_password'] = "The confirm password field is required.";
			}

			if (!empty($dataEdit['fullname'])) {
				$this->Session->write('Edit.fullname', $dataEdit['fullname']);
			} else {
				$err['fullname'] = "The fullname field is required.";
			}

			if (!empty($dataEdit['tel'])) {
				$this->Session->write('Edit.tel', $dataEdit['tel']);
			} 

			if (!empty($dataEdit['gender'])) {
				$this->Session->write('Edit.gender', $dataEdit['gender']);
			} else {
				$err['gender'] = "The gender field is required.";
			}

			if (!empty($dataEdit['email_company'])) {
				$this->Session->write('Edit.email_company', $dataEdit['email_company']);
			} else {
				$err['email_company'] = "The email company field is required.";
			}

			if (!empty($dataEdit['email_personal'])) {
				$this->Session->write('Edit.email_personal', $dataEdit['email_personal']);
			} else {
				$err['email_personal'] = "The email pesonal field is required.";
			}

			if (!empty($dataEdit['skype'])) {
				$this->Session->write('Edit.skype', $dataEdit['skype']);
			} 

			if (!empty($dataEdit['chatwork'])) {
				$this->Session->write('Edit.chatwork', $dataEdit['chatwork']);
			} 

			if (!empty($dataEdit['join_datetime'])) {
				$this->Session->write('Edit.join_datetime', date('Y-m-d', strtotime($dataEdit['join_datetime'])));
			} else {
				$err['join_datetime'] = "The day started working at the company field is required.";
			}

			if (!empty($dataEdit['exit_datetime'])) {
				$this->Session->write('Edit.exit_datetime', date('Y-m-d', strtotime($dataEdit['exit_datetime'])));
			} 

			if (!empty($dataEdit['birthday'])) {
				$this->Session->write('Edit.birthday', date('Y-m-d', strtotime($dataEdit['birthday'])));
			} 

			if (!empty($dataEdit['department'])) {
				$this->Session->write('Edit.department', $dataEdit['department']);
			} else {
				$err['department'] = "The department field is required.";
			}

			if (!empty($dataEdit['position'])) {
				$this->Session->write('Edit.position', $dataEdit['position']);
			} else {
				$err['position'] = "The position field is required.";
			}

			if (!empty($dataEdit['employee_type'])) {
				$this->Session->write('Edit.employee_type', $dataEdit['employee_type']);
			} else {
				$err['employee_type'] = "The employee type field is required.";
			}

			if (!empty($dataEdit['skill'])) {
				$this->Session->write('Edit.skill', $dataEdit['skill']);
			} 

			if (!empty($dataEdit['literacy'])) {
				$this->Session->write('Edit.literacy', $dataEdit['literacy']);
			} 

			if (!empty($dataEdit['contract_type'])) {
				$this->Session->write('Edit.contract_type', $dataEdit['contract_type']);
			} else {
				$err['contract_type'] = "The contract type field is required.";
			}

			if (!empty($dataEdit['work_address'])) {
				$this->Session->write('Edit.work_address', $dataEdit['work_address']);
			} 

			if (!empty($dataEdit['status'])) {
				$this->Session->write('Edit.status', $dataEdit['status']);
			} else {
				$errEdit['status'] = "The employee status field is required.";
			}

			if (!empty($dataEdit['address'])) {
				$this->Session->write('Edit.address', $dataEdit['address']);
			} 

			if (!empty($dataEdit['bank_account'])) {
				$this->Session->write('Edit.bank_account', $dataEdit['bank_account']);
			} 

			if (!empty($dataEdit['id_number'])) {
				$this->Session->write('Edit.id_number', $dataEdit['id_number']);
			} 

			if (!empty($dataEdit['description'])) {
				$this->Session->write('Edit.description', $dataEdit['description']);
			} 

			if (empty($err)) {
				return $this->redirect(array('controller' => 'employees', 'action' => 'confirm'));
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
	public function delete($id) {
	/* Không phải xóa hẳn ra csdl, mà chỉ chuyển từ 0 (chưa xóa) sang 1 (xóa nhưng sẽ cập nhật lại được) cho thuộc tính del_flag (kiểu như thùng rác trong win) */
		$this->Employee->id = $id;
		if (!$this->Employee->exists()) {
			throw new NotFoundException(__('Invalid employee'));
			return;
		}
		$fullname = $this->Employee->find('first', array(
			'fields' => array('Employee.fullname'),
			'conditions' => array(
				'Employee.id' => $id
			)
		));
	/*Code xóa hẳn*/
		// if ($this->Employee->delete($id)) {
		// 	$this->Session->write('notice.delete', 'Delete success');
		// } else {
		// 	$this->Session->write('notice.delete', "Don't delete");
		// }
		// return $this->redirect(array('action' => 'index'));

	/*Code theo yêu cầu*/
		$this->Employee->read(null, $id);
		$this->Employee->set(array(
			'del_flag' => 1
		));
		$this->Employee->save();
		$this->Session->write('notice.delete', 'Delete <span style="color:red;">'.$fullname['Employee']['fullname'].'</span> success');
		return $this->redirect(array('controller' => 'employees', 'action' => 'index'));
	}

	public function confirm() {
		if ($this->request->is('post')) {
			if (isset($_POST['confirm_add'])) {				
				$this->Employee->create();
				if ($this->Employee->save($this->request->data)) {
					$this->Session->write('notice.add','Add <span style="color:red;">'.$this->request->data['fullname'].'</span> success');
					return $this->redirect(array('controller' => 'employees', 'action' => 'index'));
				} else {
				//	$this->Flash->error(__('The user could not be saved. Please, try again.'));
				}
			}

			if (isset($_POST['confirm_edit'])) {
				$id = $this->Session->read('Edit.id'); 
				if ($this->request->is(array('post', 'put'))) {
					if ($this->Employee->save($this->request->data)) {
						$this->Session->write('notice.edit', 'Edit <span style="color:red;">'.$this->request->data['fullname'].'</span> success');
						return $this->redirect(array('controller' => 'employees', 'action' => 'index'));
					} else {
						//$this->Flash->error(__('The user could not be saved. Please, try again.'));
					}
				} else {
					$options = array('conditions' => array('Employee.' . $this->User->primaryKey => $id));
					$this->request->data = $this->Employee->find('first', $options);
				}
			}
		}
	}

/* -- Quản lý ngày nghỉ phép -- */
	public function leave_days() {
		$leavedays = $this->Employee->find('all', array(
			'fields' => array('Employee.id', 'Employee.fullname', 'Employee.join_datetime', 'Employee.leave_days_have', 'Employee.leave_days_took', 'Employee.leave_days_note', 'Employee.del_flag'),
			'conditions' => array(
				'Employee.del_flag' => 0
			)
		));
		$this->set('leavedays', $leavedays);

/* -- Thay đổi số ngày phép, số ngày phép đã nghỉ và note -- */
		if ($this->request->is('post')) {
			if (isset($_POST['change_have'])) {
				$dataChange = $this->request->data;
				$this->Employee->read(null, $dataChange['id']);
				$this->Employee->set(array(
					'leave_days_have' => $dataChange['leave_days_have']
				));
				$this->Employee->save();
			}

			if (isset($_POST['change_took'])) {
				$dataChange2 = $this->request->data;
				$this->Employee->read(null, $dataChange2['id']);
				$this->Employee->set(array(
					'leave_days_took' => $dataChange2['leave_days_took']
				));
				$this->Employee->save();
			}

			if (isset($_POST['change_note'])) {
				$dataChange3 = $this->request->data;
				$this->Employee->read(null, $dataChange3['id']);
				$this->Employee->set(array(
					'leave_days_note' => $dataChange3['note']
				));
				$this->Employee->save();
			}

			$leavedays = $this->Employee->find('all', array(
			'fields' => array('Employee.id', 'Employee.fullname', 'Employee.join_datetime', 'Employee.leave_days_have', 'Employee.leave_days_took', 'Employee.leave_days_note', 'Employee.del_flag'),
			'conditions' => array(
				'Employee.del_flag' => 0
			)
			));
			$this->set('leavedays', $leavedays);
		}
	}

/*-- Quản lý ngày nghỉ nhân viên theo tháng --*/
	public function monthly_manage() {
		$this->paginate = array(
			'fields' => array('Employee.id', /*'Leaveday.employee_id',*/ 'Employee.fullname'), //, 'Leaveday.leave_datetime', 'Leaveday.leave_hour', 'Leaveday.leave_reason','Employee.del_flag','Leaveday.del_flag'),
			//'limit' => 10,
			'conditions' => array(
				'Employee.del_flag' => 0
			)
		);
		$this->set('leavedays', $this->paginate());
		$users = $this->Employee->find('all', array(
			'fields' => array('Employee.id', 'Employee.fullname'),
			'conditions' => array(
				'Employee.del_flag' => 0
			)
		));
		$this->set('users', $users);

		$leave = array();
		if (isset($_POST['show_leave_days'])) {
			$leave['year'] = $this->request->data['leave_year'];
			$leave['month'] = $this->request->data['leave_month'];
		}
		else if (isset($_POST['this_month'])) {
			$leave['year'] = date('Y');
			$leave['month'] = date('m');
		}
		else if (isset($_POST['reload'])) {
			$leave['year'] = '';
			$leave['month'] = '';
		} else {
			$leave['year'] = date('Y');
			$leave['month'] = date('m');
		}
		$monthLeave = $leave['month'];
		$yearLeave = $leave['year'];
		$this->set('leave', $leave);

		$sql = "SELECT Employee.id, Employee.fullname,  Leaveday.employee_id, Leaveday.leave_datetime, Leaveday.leave_hour 
		FROM employee as Employee left join leavedays as Leaveday on Employee.id = Leaveday.employee_id 
		where Employee.del_flag = 0 and Leaveday.del_flag = 0 and year(Leaveday.leave_datetime) = {$yearLeave} and month(Leaveday.leave_datetime) = {$monthLeave}";
		// pr($this->Employee->query($sql)); die;
		$this->set('leavetimes', $this->Employee->query($sql));

        /*-- Thêm ngày nghỉ --*/
        if (isset($_POST['add_leave_day'])) {
        	$dataAddLeaveDay = $this->request->data;
        	$this->loadModel('Leaveday');
			//$this->Session->write('notice.add','Add success');
			$this->request->data['Leaveday']['employee_id'] = $dataAddLeaveDay['employee_id'];
			$this->request->data['Leaveday']['leave_datetime'] = date('Y-m-d', strtotime($dataAddLeaveDay['leave_datetime']));
			$this->request->data['Leaveday']['leave_hour'] = $dataAddLeaveDay['leave_hour'];
			$this->request->data['Leaveday']['leave_reason'] = $dataAddLeaveDay['leave_reason'];
			if ($this->Leaveday->save($this->request->data)) {
				return $this->redirect(array('controller' => 'employees', 'action' => 'monthly_manage'));
			} 
        }
	}
}
