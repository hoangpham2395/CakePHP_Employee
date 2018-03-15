<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

	public function login() {
		//Nếu đăng nhập thành công
		// if ($this->Session->check('Auth.User')) {
		// 	$this->redirect(array('controller' => 'employees', 'action' => 'dashboard'));
		// }

		//Xác thực thông tin
		if ($this->request->is('post')) {
			//error
			$errLogin = array();

			// $this->User->set($this->data); /*Lấy data cho model User*/
			// if ($this->data) { /*Kiểm tra sự tồn tại của data*/
			// 	if ($this->User->validateLogin) { /*gọi hàm validate*/
			// 		if ($this->Auth->login($this->request->data)) {
			// 			$dataLogin = $this->request->data;
			// 			$this->loadModel('Employee');
			// 			$login = $this->Employee->find('first', array(
			// 				'fields' => array('Employee.username', 'Employee.password'),
			// 				'conditions' => array(
			// 					'Employee.username' => $dataLogin['username'],
			// 					'Employee.password' => $dataLogin['password'],
			// 					'Employee.del_flag' => 0
			// 				)
			// 			));

			// 			if (!empty($login)) {
			// 				return $this->redirect(array('controller' => 'employees', 'action' => 'dashboard'));
			// 			} else {
			// 				$errLogin['login'] = 'The username or password is not correct';
			// 				$this->set('errLogin', $errLogin);
			// 			}
			// 		}
			// 	} else {
			// 		// show error validate
			// 		$err = $this->User->validationErrors;
			// 		$this->set('err', $err);
			// 	}
			// }

			$dataLogin = $this->request->data;
			if ($dataLogin['username'] == null) {
				$errLogin['username'] = 'The username field is required';
			} else if (strlen($dataLogin['username']) < 3 || strlen($dataLogin['username']) > 10) {
				$errLogin['username'] = 'The username is not correct';
			}
			if ($dataLogin['password'] == null) {
				$errLogin['password'] = 'The password field is required';
			}

			if (empty($errLogin)) {
				$this->loadModel('Employee');
				$login = $this->Employee->find('first', array(
					'fields' => array('Employee.username', 'Employee.password'),
					'conditions' => array(
						'Employee.username' => $dataLogin['username'],
						'Employee.password' => $dataLogin['password'],
						'Employee.del_flag' => 0
					)
				));

				if (!empty($login)) {
					$this->redirect(array('controller' => 'employees', 'action' => 'dashboard'));
				} else {
					$errLogin['login'] = 'Wrong username or password';
					$this->set('errLogin', $errLogin);
				}
			} else {
				$this->set('errLogin', $errLogin);
			}
		}
	}

	public function logout() {
		$this->Session->destroy();
		// $this->redirect($this->Auth->logout());
		$this->redirect(array('controller' => 'users', 'action' =>'login'));
	}
}