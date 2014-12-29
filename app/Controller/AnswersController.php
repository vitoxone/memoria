<?php
App::uses('AppController', 'Controller');
/**
 * Answers Controller
 *
 * @property Answer $Answer
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AnswersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public $uses = array('Answer','Question', 'User', 'Career');


/**
 * Método que lista las respuestas del sistema
 *
 * @return void
 */
	public function admin_index() {
		$this->Answer->recursive = 0;
		$this->set('answers', $this->Paginator->paginate());
	}


 /**
 * Metodo que carga el resumen de un usuario
 *
 * @return void
 */
	public function resume($user_id) {
		
	$this->layout = 'page';	
	$type1 = $this->Answer->getType1($user_id);
	$type2 = $this->Answer->getType2($user_id);
	$type3 = $this->Answer->getType3($user_id);
	$type4 = $this->Answer->getType4($user_id);

	$this->set(compact('type1','type2', 'type3', 'type4', 'careers'));

	$options = array('conditions' => array('User.' . $this->User->primaryKey => $user_id));
	$this->set('user', $this->User->find('first', $options));
	}

	 /**
 * Metodo que hace la transicion entre el resumen privado y el publico
 * @param int $user_id
 * @return void
 */

	public function prev_resume($user_id)
	{
		$this->autoRender = false;
		$this->User->addView($user_id);
		$this->redirect('/answers/public_resume/'.$user_id);

	}

/**
 * Metodo que carga un el perfil público
 * @param int $user_id
 * @return void
 */
	public function public_resume($user_id) {

	//if($current_controller != $this->params['controller']){

	//	$this->User->addView($user_id);
	//}
		
	$this->layout = 'page';	
	$type1 = $this->Answer->getType1($user_id);
	$type2 = $this->Answer->getType2($user_id);
	$type3 = $this->Answer->getType3($user_id);
	$type4 = $this->Answer->getType4($user_id);

	$this->set(compact('type1','type2', 'type3', 'type4','current_action'));

	$options = array('conditions' => array('User.' . $this->User->primaryKey => $user_id));
	$this->set('user', $this->User->find('first', $options));
	}	

/**
 * Metodo que muestra una respuesta
 *
 * @throws NotFoundException
 * @param int $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Answer->exists($id)) {
			throw new NotFoundException(__('Invalid answer'));
		}
		$options = array('conditions' => array('Answer.' . $this->Answer->primaryKey => $id));
		$this->set('answer', $this->Answer->find('first', $options));
	}

/**
 * método que agrega una respuesta
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Answer->create();
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__('La respuesta ha sido guardada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La respuesta no se pudo guardar. Intente nuevamente.'));
			}
		}
		$questions = $this->Answer->Question->find('list');
		$users = $this->Answer->User->find('list');
		$this->set(compact('questions', 'users'));
	}

/**
 * Método que edita una respuesta
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Answer->exists($id)) {
			throw new NotFoundException(__('Invalid answer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__('La respuesta ha sido guardada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La respuesta no se pudo guardar. Intente nuevamente.'));
			}
		} else {
			$options = array('conditions' => array('Answer.' . $this->Answer->primaryKey => $id));
			$this->request->data = $this->Answer->find('first', $options);
		}
		$questions = $this->Answer->Question->find('list');
		$users = $this->Answer->User->find('list');
		$this->set(compact('questions', 'users'));
	}

/**
 * Método que elimina una respuesta
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Answer->id = $id;
		if (!$this->Answer->exists()) {
			throw new NotFoundException(__('Invalid answer'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Answer->delete()) {
			$this->Session->setFlash(__('La respuesta ha sido eliminada.'));
		} else {
			$this->Session->setFlash(__('La respuesta no se pudo guardar. Intente nuevamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
