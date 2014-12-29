<?php
App::uses('AppController', 'Controller');
/**
 * Styles Controller
 *
 * @property Style $Style
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class StylesController extends AppController {

	public $components = array('Paginator', 'Session');

/**
 * Método de administrador que lista los test del sistema
 *
 * @return void
 */
	public function admin_index() {
		$this->Style->recursive = 0;
		$this->set('styles', $this->Paginator->paginate());
	}

/**
 * Método de administrador que muestra un test del sistema
 *
 * @param int $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Style->exists($id)) {
			throw new NotFoundException(__('Invalid style'));
		}
		$options = array('conditions' => array('Style.' . $this->Style->primaryKey => $id));
		$this->set('style', $this->Style->find('first', $options));
	}

/**
 * Método de administrador que agrega un test del sistema
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Style->create();
			if ($this->Style->save($this->request->data)) {
				$this->Session->setFlash(__('The style has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The style could not be saved. Please, try again.'));
			}
		}
	}

/**
 * Método de administrador que edita un test del sistema
 *
 * @param int $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Style->exists($id)) {
			throw new NotFoundException(__('Invalid style'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Style->save($this->request->data)) {
				$this->Session->setFlash(__('The style has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The style could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Style.' . $this->Style->primaryKey => $id));
			$this->request->data = $this->Style->find('first', $options);
		}
	}

/**
 * Método de administrador que elimina un test del sistema
 *
 * @param int $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Style->id = $id;
		if (!$this->Style->exists()) {
			throw new NotFoundException(__('Invalid style'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Style->delete()) {
			$this->Session->setFlash(__('The style has been deleted.'));
		} else {
			$this->Session->setFlash(__('The style could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
