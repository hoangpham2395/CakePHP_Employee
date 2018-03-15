<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $helper = array('PhpExcel');

//login
	public function login() {
		// delete session
		if ($this->request->is('get')) {
			if ($this->Session->check('login')) {
				$this->Session->delete('login');
			}
		}

		//if already logged-in, redirect
		if ($this->Session->check('Auth.User')) {
			$this->redirect(array('action' => 'index'));
		}

		//if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			$this->User->set($this->data); //lấy data cho User
			if ($this->data) { //Kiểm tra sự tồn tại của data
				if ($this->User->validate_login()) { //Gọi hàm validate_login
					if ($this->Auth->login($this->request->data)) {
						// $errLogin = array();
						$dataLogin = $this->request->data;

						//check error
						// if (empty($dataLogin['username'])) {
						// 	$errLogin['username'] = 'A username is required.';
						// } else if (strlen($dataLogin['username']) < 3 || strlen($dataLogin['username']) > 10) {
						// 	$errLogin['username'] = 'Username must be between 3 to 10 characters.';
						// }

						// if (empty($dataLogin['password'])) {
						// 	$errLogin['password'] = 'A password is required.';
						// } else if (strlen($dataLogin['password']) <6) {
						// 	$errLogin['password'] = 'Password must be have mimimum of 6 characters.';
						// }

						//login
						// if (empty($errLogin)) {
						$password = AuthComponent::password($dataLogin['password']);
							$login = $this->User->find('first', array(
								'fields' => array('User.id', 'User.username', 'User.password', 'User.image'),
								'conditions' => array(
									'User.username' => $dataLogin['username'],
									'User.password' => $password,
									'User.del_flag' => 0
								)
							));
							if (!empty($login)) {
								$this->Session->write('login.username', $login['User']['username']);
								$this->Session->write('login.id', $login['User']['id']);
								$this->Session->write('login.image', $login['User']['image']);
								$this->redirect($this->Auth->redirectUrl());
							} else {
								// $errLogin['login'] = 'Invalid username or password.';
								// $this->set('errLogin', $errLogin);
								$this->Session->write('login.error', 'Invalid username or password.');
							}
						// } else {
						// 	$this->set('errLogin', $errLogin);
						// }
					}
				} else {
					$err = $this->User->validationErrors;
					$this->set('err', $err);
				}
			}
		}
	}

//logout
	public function logout() {
		$this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		// show data
		$this->paginate = array(
			'fields' => array('User.id', 'User.fullname','User.email_company','User.chatwork','User.gender','User.birthday','User.department','User.position','User.user_type','User.status','User.join_datetime'),
			'limit' => 10,
			'conditions' => array(
				'User.del_flag' => 0
			)
		);
		$this->set('users', $this->paginate());

		//search
		if ($this->request->is('post')) {
			$dataSearch = $this->request->data;

			$fullname = !empty($dataSearch['fullname']) ? array('User.fullname LIKE' => '%'.$dataSearch['fullname'].'%') : array();
			$birthday = !empty($dataSearch['birthday']) ? array('User.birthday' => date('Y-m-d', strtotime($dataSearch['birthday']))) : array();
			$gender = !empty($dataSearch['gender']) ? array('User.gender LIKE' => $dataSearch['gender']) : array();
			$email_company = !empty($dataSearch['email_company']) ? array('User.email_company LIKE' => '%'.$dataSearch['email_company'].'%') : array();
			$chatwork = !empty($dataSearch['chatwork']) ? array('User.chatwork LIKE' => '%'.$dataSearch['chatwork'].'%') : array();
			$department = !empty($dataSearch['department']) ? array('User.department' => $dataSearch['department']) : array();
			$position = !empty($dataSearch['position']) ? array('User.position' => $dataSearch['position']) : array();
			$user_type = !empty($dataSearch['user_type']) ? array('User.user_type' => $dataSearch['user_type']) : array();
			$status = !empty($dataSearch['status']) ? array('User.status' => $dataSearch['status']) : array();
			$join_datetime = !empty($dataSearch['join_datetime']) ? array('User.join_datetime' => date('Y-m-d', strtotime($dataSearch['join_datetime']))) : array();

			$this->paginate = array(
				'fields' => array('User.id', 'User.fullname','User.email_company','User.chatwork','User.gender','User.birthday','User.department','User.position','User.user_type','User.status','User.join_datetime'),
				'limit' => 10,
				'conditions' => array(
					$fullname,
					$birthday,
					$gender,
					$email_company,
					$chatwork,
					$department,
					$position,
					$user_type,
					$status,
					$join_datetime,
					'User.del_flag' => 0
				)
			);
			$search = $this->paginate();
			$this->set('users', $search);
		}
		//Show notice
		if ($this->request->is('get')) {
			if ($this->Session->check('notice')) {
				$notice = array();
				$notice['delete'] = $this->Session->read('notice.delete');
				$notice['add'] = $this->Session->read('notice.add');
				$notice['edit'] = $this->Session->read('notice.edit');
				$notice['password'] = $this->Session->read('notice.password');
				$this->set('notice', $notice);
				$this->Session->delete('notice');
			}
		}
	}

//Doashboard
	public function doashboard() {
		$this->paginate = array(
			'conditions' => array(
				'del_flag' => 0
			)
		);
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id) {
		$this->set('user', $this->User->findById($id));
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

		$errorAdd = array();
		if ($this->request->is('post')) {
			$dataAdd = $this->request->data;

			if (empty($dataAdd['username'])) {
				$errorAdd['username'] = "The username field is required.";
			} else {
				$username = $this->User->find('first', array(
					'conditions' => array(
						'username' => $dataAdd['username'],
						'del_flag' => 0
					)
				));
				if (!empty($username)) {
					$errorAdd['username'] = "The username is taken. Try another.";
				} else {
					$this->Session->write('Add.username', $dataAdd['username']);
				}
			}

			if (empty($dataAdd['password'])) {
				$errorAdd['password'] = "The password field is required";
			} else {
				$this->Session->write('Add.password', $dataAdd['password']);
			}

			if (empty($dataAdd['confirm_password'])) {
				$errorAdd['confirm_password'] = "The confirm password field is required.";
			} else if (strcmp($dataAdd['confirm_password'], $dataAdd['password']) != 0) {
				$errorAdd['confirm_password'] = "These passwords don't match. Try again?";
			}

			if (empty($dataAdd['fullname'])) {
				$errorAdd['fullname'] = 'The fullname field is required.';
			} else {
				$this->Session->write('Add.fullname', $dataAdd['fullname']);
			}

			if (empty($dataAdd['gender'])) {
				$errorAdd['gender'] = "The gender field is required.";
			} else {
				$this->Session->write('Add.gender', $dataAdd['gender']);
			}

			$birthday = !empty($dataAdd['birthday']) ? date('Y-m-d', strtotime($dataAdd['birthday'])) : date('Y-m-d', strtotime('0000-00-00'));
			$this->Session->write('Add.birthday', $birthday); 

			$tel = !empty($dataAdd['tel']) ? $dataAdd['tel'] : '';
			$this->Session->write("Add.tel", $tel);

			if (empty($dataAdd['email_company'])) {
				$errorAdd['email_company'] = "The email company field is required.";
			} else {
				$this->Session->write('Add.email_company', $dataAdd['email_company']);
			}

			if (empty($dataAdd['email_personal'])) {
				$errorAdd['email_personal'] = 'The email personal field is required.';
			} else {
				$this->Session->write('Add.email_personal', $dataAdd['email_personal']);
			}

			$skype = !empty($dataAdd['skype']) ? $dataAdd['skype'] : '';
			$this->Session->write('Add.skype', $skype);

			$chatwork = !empty($dataAdd['chatwork']) ? $dataAdd['chatwork'] : '';
			$this->Session->write('Add.chatwork', $chatwork);

			if (empty($dataAdd['join_datetime'])) {
				$errorAdd['join_datetime'] = "The day started at the company field is required.";
			} else {
				$this->Session->write('Add.join_datetime', date('Y-m-d', strtotime($dataAdd['join_datetime'])));
			}

			$exit_datetime = !empty($dataAdd['exit_datetime']) ? date('Y-m-d', strtotime($dataAdd['exit_datetime'])) : date('Y-m-d', strtotime("0000-00-00"));
			$this->Session->write('Add.exit_datetime', $exit_datetime);

			if (empty($dataAdd['department'])) {
				$errorAdd['department'] = 'The department field is required.';
			} else {
				$this->Session->write('Add.department', $dataAdd['department']);
			}

			if (empty($dataAdd['position'])) {
				$errorAdd['position'] = "The position field is required.";
			} else {
				$this->Session->write('Add.position', $dataAdd['position']);
			}

			if (empty($dataAdd['user_type'])) {
				$errorAdd['user_type'] = "The employee types field is required.";
			} else {
				$this->Session->write('Add.user_type', $dataAdd['user_type']);
			}

			if (empty($dataAdd['status'])) {
				$errorAdd['status'] = 'The employee status field is required.';
			} else {
				$this->Session->write('Add.status', $dataAdd['status']);
			}

			if (empty($dataAdd['contract_type'])) {
				$errorAdd['contract_type'] = 'The contract type field is required.';
			} else {
				$this->Session->write('Add.contract_type', $dataAdd['contract_type']);
			}

			if (empty($dataAdd['work_address'])) {
				$errorAdd['work_address'] = "The work address field is required.";
			} else {
				$this->Session->write('Add.work_address', $dataAdd['work_address']);
			}

			$skill = !empty($dataAdd['skill']) ? $dataAdd['skill'] : '';
			$this->Session->write('Add.skill', $dataAdd['skill']);

			$literacy = !empty($dataAdd['literacy']) ? $dataAdd['literacy'] : '';
			$this->Session->write('Add.literacy', $literacy);

			$address = !empty($dataAdd['address']) ? $dataAdd['address'] : '';
			$this->Session->write('Add.address', $address);

			$bank_account = !empty($dataAdd['bank_account']) ? $dataAdd['bank_account'] : '';
			$this->Session->write('Add.bank_account', $bank_account);

			$id_number = !empty($dataAdd['id_number']) ? $dataAdd['id_number'] : '';
			$this->Session->write('Add.id_number', $id_number);

			$description = !empty($dataAdd['description']) ? $dataAdd['description'] : '';
			$this->Session->write('Add.description', $description);

			if (empty($errorAdd)) {
				return $this->redirect(array('controller' => 'users', 'action' => 'confirm'));
			}
			$this->set('errorAdd', $errorAdd);
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
		// if (!$this->User->exists($id)) {
		// 	throw new NotFoundException(__('Invalid user'));
		// }
		// if ($this->request->is(array('post', 'put'))) {
		// 	if ($this->User->save($this->request->data)) {
		// 		$this->Flash->success(__('The user has been saved.'));
		// 		return $this->redirect(array('action' => 'index'));
		// 	} else {
		// 		$this->Flash->error(__('The user could not be saved. Please, try again.'));
		// 	}
		// } else {
		// 	$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		// 	$this->request->data = $this->User->find('first', $options);
		// }
		if ($this->request->is('get')) {
			if ($this->Session->check('Add')) {
				$this->Session->delete('Add');
			}
		}
		$edit = $this->User->find('first', array(
			'conditions' => array(
				'id' => $id
			)
		));
		$this->set('user', $edit);

		$errorEdit = array();
		if ($this->request->is('post')) {
			$dataEdit = $this->request->data;

			$this->Session->write('Edit.id', $id);

			if (empty($dataEdit['username'])) {
				$errorEdit['username'] = "The username field is required.";
			} else if (strcmp($dataEdit['username'], $edit['User']['username']) != 0) {
				$username = $this->User->find('first', array(
					'conditions' => array(
						'username' => $dataEdit['username'],
						'del_flag' => 0
					)
				));
				if (!empty($username)) {
					$errorEdit['username'] = "The username is taken. Try another.";
				} 
			} else {
				$this->Session->write('Edit.username', $dataEdit['username']);
			}

			// if (empty($dataEdit['password'])) {
			// 	$errorEdit['password'] = "The password field is required";
			// } else {
			// 	$this->Session->write('Edit.password', $dataEdit['password']);
			// }

			// if (empty($dataEdit['confirm_password'])) {
			// 	$errorEdit['confirm_password'] = "The confirm password field is required.";
			// } else if (strcmp($dataEdit['confirm_password'], $dataEdit['password']) != 0) {
			// 	$errorEdit['confirm_password'] = "These passwords don't match. Try again?";
			// }

			if (empty($dataEdit['fullname'])) {
				$errorEdit['fullname'] = 'The fullname field is required.';
			} else {
				$this->Session->write('Edit.fullname', $dataEdit['fullname']);
			}

			if (empty($dataEdit['gender'])) {
				$errorEdit['gender'] = "The gender field is required.";
			} else {
				$this->Session->write('Edit.gender', $dataEdit['gender']);
			}

			$birthday = !empty($dataEdit['birthday']) ? date('Y-m-d', strtotime($dataEdit['birthday'])) : date('Y-m-d', strtotime('0000-00-00'));
			$this->Session->write('Edit.birthday', $birthday); 

			$tel = !empty($dataEdit['tel']) ? $dataEdit['tel'] : '';
			$this->Session->write("Edit.tel", $tel);

			if (empty($dataEdit['email_company'])) {
				$errorEdit['email_company'] = "The email company field is required.";
			} else {
				$this->Session->write('Edit.email_company', $dataEdit['email_company']);
			}

			if (empty($dataEdit['email_personal'])) {
				$errorEdit['email_personal'] = 'The email personal field is required.';
			} else {
				$this->Session->write('Edit.email_personal', $dataEdit['email_personal']);
			}

			$skype = !empty($dataEdit['skype']) ? $dataEdit['skype'] : '';
			$this->Session->write('Edit.skype', $skype);

			$chatwork = !empty($dataEdit['chatwork']) ? $dataEdit['chatwork'] : '';
			$this->Session->write('Edit.chatwork', $chatwork);

			if (empty($dataEdit['join_datetime'])) {
				$errorEdit['join_datetime'] = "The day started at the company field is required.";
			} else {
				$this->Session->write('Edit.join_datetime', date('Y-m-d', strtotime($dataEdit['join_datetime'])));
			}

			$exit_datetime = !empty($dataEdit['exit_datetime']) ? date('Y-m-d', strtotime($dataEdit['exit_datetime'])) : date('Y-m-d', strtotime("0000-00-00"));
			$this->Session->write('Edit.exit_datetime', $exit_datetime);

			if (empty($dataEdit['department'])) {
				$errorEdit['department'] = 'The department field is required.';
			} else {
				$this->Session->write('Edit.department', $dataEdit['department']);
			}

			if (empty($dataEdit['position'])) {
				$errorEdit['position'] = "The position field is required.";
			} else {
				$this->Session->write('Edit.position', $dataEdit['position']);
			}

			if (empty($dataEdit['user_type'])) {
				$errorEdit['user_type'] = "The employee types field is required.";
			} else {
				$this->Session->write('Edit.user_type', $dataEdit['user_type']);
			}

			if (empty($dataEdit['status'])) {
				$errorEdit['status'] = 'The employee status field is required.';
			} else {
				$this->Session->write('Edit.status', $dataEdit['status']);
			}

			if (empty($dataEdit['contract_type'])) {
				$errorEdit['contract_type'] = 'The contract type field is required.';
			} else {
				$this->Session->write('Edit.contract_type', $dataEdit['contract_type']);
			}

			if (empty($dataEdit['work_address'])) {
				$errorEdit['work_address'] = "The work address field is required.";
			} else {
				$this->Session->write('Edit.work_address', $dataEdit['work_address']);
			}

			$skill = !empty($dataEdit['skill']) ? $dataEdit['skill'] : '';
			$this->Session->write('Edit.skill', $dataEdit['skill']);

			$literacy = !empty($dataEdit['literacy']) ? $dataEdit['literacy'] : '';
			$this->Session->write('Edit.literacy', $literacy);

			$address = !empty($dataEdit['address']) ? $dataEdit['address'] : '';
			$this->Session->write('Edit.address', $address);

			$bank_account = !empty($dataEdit['bank_account']) ? $dataEdit['bank_account'] : '';
			$this->Session->write('Edit.bank_account', $bank_account);

			$id_number = !empty($dataEdit['id_number']) ? $dataEdit['id_number'] : '';
			$this->Session->write('Edit.id_number', $id_number);

			$description = !empty($dataEdit['description']) ? $dataEdit['description'] : '';
			$this->Session->write('Edit.description', $description);

			if (empty($errorEdit)) {
				return $this->redirect(array('controller' => 'users', 'action' => 'confirm'));
			}
			$this->set('errorEdit', $errorEdit);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		
	//Xóa khỏi CSDL
		// if ($this->User->delete($id)) {
		// 	$this->Session->write('notice.delete', 'Delete account '.$fullname.' success!');
		// } else {
		// 	$this->Session->write('error.delete', 'Do not delete account '.$fullname.'. Try again?');
		// }
		// return $this->redirect(array('Controller' => 'users', 'action' => 'index'));

	//Xóa khỏi hệ thống, nhưng vẫn còn trong CSDL (chỉ cần thay đổi thuộc tính del_flag từ 0 sang 1)
		// $this->User->read(null, $id);
		// $this->User->set(array(
		// 	'del_flag' => 1,
		// 	'modified' =>date('Y-m-d H:i:s')
		// ));
		// $this->User->save();
		// $fullname = $this->User->findById($id); 
		// echo 'del_flag: '.$fullname['User']['del_flag'].'<br> modified: '.$fullname['User']['modified']; die;
		// $this->Session->write('notice.delete', 'Delete account <span style="color:red;">'.$fullname['User']['fullname'].'</span> success!');
		// return $this->redirect(array('controller' => 'users', 'action' => 'index'));
	
		if ($this->request->is('post')) {
			$dataSave = array('del_flag' => 1, 'modified' => date('Y-m-d H:i:s'));
			if ($this->User->save($dataSave)) {
				$fullname = $this->User->findById($id);
				$this->Session->write('notice.delete', 'Delete account <span style="color:red;">'.$fullname['User']['fullname'].'</span> success!');
			}
			return $this->redirect(array('controller' => 'users', 'action' => 'index'));
		}
	}

// Export csv
	public function export_data() {
		$users = $this->User->find('all', array(
			'conditions' => array(
				'User.del_flag' => 0
			)
		));
		$this->set('users', $users);
		if ( $this->request->query('export_excel')) {
			$this->layout = null;
			$this->render('excel_report'); // dẫn xuất đến file excel_report.ctp
		}
	}

// Import data
	public function import_data() {
		if ($this->request->is('post')) {
			$this->layout = null;
			$this->render('import');
		}
	}

	//demo import
	public function import() {
		
	}

	//Confirm
	public function confirm() {
		if ($this->request->is('post')) {
			if (isset($_POST['confirm_edit'])) {
				$id = $this->Session->read('Edit.id'); 
				if ($this->request->is(array('post', 'put'))) {
					if ($this->User->save($this->request->data)) {
						$this->Session->write('notice.edit', 'Edit account <span style="color:red;">'.$this->request->data['fullname'].'</span> success!');
						return $this->redirect(array('controller' => 'users', 'action' => 'index'));
					} else {
						//echo 'The user could not be saved. Please, try again.'; die;
						echo debug($this->User->validationErrors); die;
					}
				} else {
					$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
					$this->request->data = $this->User->find('first', $options);
				}
			} else if (isset($_POST['confirm_add'])) {
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					$this->Session->write('notice.add', 'Add account <span style="color:red;">'.$this->request->data['fullname'].'</span> success!');
					return $this->redirect(array('controller' => 'users', 'action' => 'index'));
				} else {
					echo debug($this->User->validationErrors); die;
				}
			}
		}
	}

	//Change password
	public function change_password($id) {
		$this->User->id = $id;
		$user = $this->User->findById($id);
		$this->set('user', $user);

		if ($this->request->is('post')) {
			$dataChange = $this->request->data;
			$errorChange = array();

			if (empty($dataChange['password'])) {
				$errorChange['password'] = "The old password field is required.";
			} else if (strcmp(AuthComponent::password($dataChange['password']), $user['User']['password']) != 0) {
				$errorChange['password'] = "Wrong password. Please, try again.";
			}

			if (empty($dataChange['new_password'])) {
				$errorChange['new_password'] = "The new password field is required.";
			} else if (strlen($dataChange['new_password']) < 6) {
				$errorChange['new_password'] = "Short passwords are easy to guess. Try one with at least 6 characters.";
			}

			if (empty($dataChange['confirm_new_password'])) {
				$errorChange['confirm_new_password'] = "The confirm new password field is required.";
			} else if (strcmp($dataChange['new_password'], $dataChange['confirm_new_password']) != 0) {
				$errorChange['confirm_new_password'] = "These passwords don't match. Try again?";
			} 

			if (!empty($errorChange)) {
				$this->set('errorChange', $errorChange);
			} else {
				$dataSavePass = array('password' => $dataChange['new_password']);
				if ($this->User->save($dataSavePass)) {
					$this->Session->write('notice.password', 'Change password account <span style="color:red;">'.$user['User']['fullname'].'</span> success!');
					return $this->redirect(array('controller' => 'users', 'action' => 'index'));
				}
			}
		}
	}

/**
 * all manage method
 *
 * @return void
 */
	public function all() {
		$this->loadModel('User');
		$this->paginate = array(
			'fields' => array('User.id', 'User.fullname', 'User.join_datetime', 'User.leave_days_have', 'User.leave_days_took', 'User.leave_days_note'),
			'limit' => 10,
			'conditions' => array(
				'User.del_flag' => 0
			)
		);
		// pr($this->paginate()); die;
		$this->set('users', $this->paginate());
	}

/*leave days have*/
	function leaveDaysHave($id) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid leaveday'));
		}
		if ($this->request->is(array('put', 'post'))) {
			$this->User->read(null, $id);
			$this->User->set(array(
				'leave_days_have'=> $this->request->data['leave_days_have']
			));
			if ($this->User->save()) {
				return $this->redirect(array('controller' => 'users', 'action' => 'all'));
			} else {
				echo $this->User->validationErrors(); die;
			}
		}
	}	

/*leave days took*/
	function leaveDaysTook($id) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid leaveday'));
		}
		if ($this->request->is(array('put', 'post'))) {
			$this->User->read(null, $id);
			$this->User->set(array(
				'leave_days_took'=> $this->request->data['leave_days_took']
			));
			if ($this->User->save()) {
				return $this->redirect(array('controller' => 'users', 'action' => 'all'));
			} else {
				echo $this->User->validationErrors(); die;
			}
		}
	}	

/*leave days have*/
	function addNote($id) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid leaveday'));
		}
		if ($this->request->is(array('put', 'post'))) {
			$this->User->read(null, $id);
			$this->User->set(array(
				'leave_days_note'=> $this->request->data['leave_days_note']
			));
			if ($this->User->save()) {
				return $this->redirect(array('controller' => 'users', 'action' => 'all'));
			} else {
				echo $this->User->validationErrors(); die;
			}
		}
	}			

}