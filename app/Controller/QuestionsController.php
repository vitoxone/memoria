<?php
App::uses('AppController', 'Controller');

class QuestionsController extends AppController {

	public $components = array('Paginator', 'Session', 'RequestHandler');


///////////////////////////////////////////////////////////////
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
//////////////////////////////////////////////////////////////


/**
 * Método de administrador que lista las preguntas del sistema
 *
 * @return void
 */
	public function admin_index2() {

			$this->layout = 'admin';
			if ($this->request->is('post')) {

			if($this->request->data['Question']['active'] == '1' || $this->request->data['Question']['active'] == '0') {
				$conditions[] = array(
					'Question.active' => $this->request->data['Question']['active']
				);
				$this->Session->write('Question.active', $this->request->data['Question']['active']);
			} else {
				$this->Session->write('Question.active', '');
			}


			if(!empty($this->request->data['Question']['name'])) {
				$filter = $this->request->data['Question']['filter'];
				$this->Session->write('Question.filter', $filter);
				$name = $this->request->data['Question']['name'];
				$this->Session->write('Question.name', $name);
				$conditions[] = array(
					'Question.' . $filter . ' LIKE' => '%' . $name . '%'
				);
			} else {
				$this->Session->write('Question.filter', '');
				$this->Session->write('Question.name', '');
			}

			$this->Session->write('Question.conditions', $conditions);
			return $this->redirect(array('action' => 'index'));

		}

		if($this->Session->check('Question')) {
			$all = $this->Session->read('Question');
		} else {
			$all = array(
				'active' => '',
				'name' => '',
				'filter' => '',
				'conditions' => ''
			);
		}
		$this->set(compact('all'));

		$this->Paginator = $this->Components->load('Paginator');

		$this->Paginator->settings = array(
			'Question' => array(
				'recursive' => -1,
				'limit' => 50,
				'conditions' => $all['conditions'],
				'order' => array(
					'Question.name' => 'ASC'
				),
				'paramType' => 'querystring',
			)
		);
		$breeds = $this->Paginator->paginate();

		// $categories= $this->Product->Category->find('list', array(
		// 	'recursive' => -1,
		// 	'order' => array(
		// 		'Category.name' => 'ASC'
		// 	)
		// )););


		$this->Question->recursive = 0;
		$this->set('questions', $this->Paginator->paginate());
	}	

/**
 * Método de administrador que muestra una pregunta del sistema
 *
 * @param int $id
 * @return void
 */
	public function admin_view($id = null) {
			$this->layout = 'admin';
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
		$this->set('question', $this->Question->find('first', $options));
	}

/**
 * Método de administrador que agrega una pregunta al sistema
 *
 * @return void
 */
	public function admin_add() {
			$this->layout = 'admin';
		if ($this->request->is('post')) {
			$this->Question->create();
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('La pregunta ha sido guardada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La preguntan no se ha guardado. Intente nuevamente'));
			}
		}
		$tests = $this->Question->Test->find('list');
		$styles = $this->Question->Style->find('list');
		$this->set(compact('tests','styles'));
	}

/**
 * Método de administrador que edita una pregunta del sistema
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
			$this->layout = 'admin';
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Question']['id'] = $id;
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('La pregunta ha sido guardada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La pregunta no se ha guardado. Intente nuevamente.'));
			}
		} else {
			$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
			$this->request->data = $this->Question->find('first', $options);
		}
		$tests = $this->Question->Test->find('list');
		$styles = $this->Question->Style->find('list');
		$this->set(compact('tests','styles'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->layout = 'admin';
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Question->delete()) {
			$this->Session->setFlash(__('La pregunta ha sido borrada.'));
		} else {
			$this->Session->setFlash(__('La pregunta no se ha guardado. Intente nuevamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
