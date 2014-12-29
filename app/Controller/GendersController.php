<?php
App::uses('AppController', 'Controller');

class GendersController extends AppController {

	public $components = array('Paginator', 'Session');



/**
 * Método de administrador que lista los generos
 *
 * @return void
 */
	public function admin_index() {
		$this->Gender->recursive = 0;
		$this->set('genders', $this->Paginator->paginate());
	}

/**
 * Método de administrador que muestra un genero
 *
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Gender->exists($id)) {
			throw new NotFoundException(__('Invalid gender'));
		}
		$options = array('conditions' => array('Gender.' . $this->Gender->primaryKey => $id));
		$this->set('gender', $this->Gender->find('first', $options));
	}

/**
 * Método de administrador que agrega un genero
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Gender->create();
			if ($this->Gender->save($this->request->data)) {
				$this->Session->setFlash(__('El género ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El género no se pudo guardar. Intente nuevamente.'));
			}
		}
	}

/**
 * Método de administrador que edita un genero
 *
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Gender->exists($id)) {
			throw new NotFoundException(__('Invalid gender'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Gender->save($this->request->data)) {
				$this->Session->setFlash(__('El género ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gender could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Gender.' . $this->Gender->primaryKey => $id));
			$this->request->data = $this->Gender->find('first', $options);
		}
	}

/**
 * Método de administrador que elimina un genero
 *
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Gender->id = $id;
		if (!$this->Gender->exists()) {
			throw new NotFoundException(__('Invalid gender'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Gender->delete()) {
			$this->Session->setFlash(__('El género ha sido borrado.'));
		} else {
			$this->Session->setFlash(__('El género no se pudo eliminar. Intente nuevamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
