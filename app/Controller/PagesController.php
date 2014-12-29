<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {


	public $uses = array('Pages', 'Career', 'User');

	///////////////////////////////////////////////////////////////
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('display', 'about');
	}
//////////////////////////////////////////////////////////////

/**
 * Método muestra el home de la aplicación
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function home() {
		$this->layout = 'page';

		$careers = $this->Career->find('all');

		$i=0;
		$data = array();
		foreach($careers as $u){
			$asd = $u['Career']['id'];			
			$number= $this->User->find('count', array('conditions' => array('User.careers_id' => $asd)));			
			 $posts[] = array('career'=> $u['Career']['name'], 'number'=> $number);
			$i++;
		}
		$json = json_encode($posts);

		$this->set(compact('json'));

	}

/**
 * Método que Muestra las opciones de test disponibles
 *
 * @return void
 */

	public function init() {
		$this->layout = 'page';

	}

		public function display() {
			$this->layout = 'page';
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}

		$careers = $this->Career->find('all');

		$i=0;
		$data = array();
		foreach($careers as $u){
			$asd = $u['Career']['id'];			
			$number= $this->User->find('count', array('conditions' => array('User.careers_id' => $asd)));			
			 $posts[] = array('career'=> $u['Career']['name'], 'number'=> $number);
			$i++;
		}
		$json = json_encode($posts);

		$this->set(compact('json'));
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

/**
 * Método que despliega la información "Qué es" del menú
  *
 * @return void
 */
	public function about() {
		$this->layout = 'page';

	}

	
}