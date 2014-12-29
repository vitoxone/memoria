<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

		public $components = array(
		'Session',
		'Auth'
	);

////////////////////////////////////////////////////////////

	public function beforeFilter() {

		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => false);
		$this->Auth->loginRedirect = array('controller' => 'questions', 'action' => 'index', 'admin' => true);
		$this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'home', 'admin' => false);
		$this->Auth->authorize = array('Controller');

		$this->Auth->authenticate = array(
			AuthComponent::ALL => array(
				'userModel' => 'User',
				'fields' => array(
					'username' => 'username',
					'password' => 'password'
				),
				'scope' => array(
					'User.active' => 1,
				)
			), 'Form'
		);

		if(isset($this->request->params['admin']) && ($this->request->params['prefix'] == 'admin')) {
			if($this->Session->check('Auth.User')) {
				$this->set('authUser', $this->Auth->user());
				$loggedin = $this->Session->read('Auth.User');
				$this->set(compact('loggedin'));
				$this->layout = 'admin';
			}
		} elseif(isset($this->request->params['customer']) && ($this->request->params['prefix'] == 'customer')) {
			if($this->Session->check('Auth.User')) {
				$this->set('authUser', $this->Auth->user());
				$loggedin = $this->Session->read('Auth.User');
				$this->set(compact('loggedin'));
				$this->layout = 'customer';
			}
		} else {
			$this->Auth->allow();
		}

	}


	////////////////////////////////////////////////////////////

	public function isAuthorized($user) {
		if (($this->params['prefix'] === 'admin') && ($user['role_id'] != '1')) {
			echo '<a href="/users/logout">Logout</a><br />';
			die('Invalid request for '. $user['User']['role_id'] . ' user.');
		}
		return true;
	}
////////////////////////////////////////////////////////////

	public function admin_switch($field = null, $id = null) {
		$this->autoRender = false;
		$model = $this->modelClass;
		if ($this->$model && $field && $id) {
			$field = $this->$model->escapeField($field);
			return $this->$model->updateAll(array($field => '1 -' . $field), array($this->$model->escapeField() => $id));
		}
		if(!$this->RequestHandler->isAjax()) {
			return $this->redirect($this->referer());
		}
	}		
}
