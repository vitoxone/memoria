<?php
App::uses('AppController', 'Controller');

class RolesController extends AppController {


	public $components = array('Paginator', 'Session');



/**
 * Método de administrador que lista los roles del sistema
 *
 * @return void
 */
	public function admin_index() {
		$this->Role->recursive = 0;
		$this->set('roles', $this->Paginator->paginate());
	}

/**
 * Método de administrador que muestra un rol del sistema
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Role->exists($id)) {
			throw new NotFoundException(__('Invalid role'));
		}
		$options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
		$this->set('role', $this->Role->find('first', $options));
	}

/**
 * Método de administrador que agrega un nuevo rola al sistema
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Role->create();
			if ($this->Role->save($this->request->data)) {
				$this->Session->setFlash(__('El rol ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El rol no se pudo guardar. Intente nuevamente.'));
			}
		}
	}

/**
 * Método de administrador que edita un rol del sistema
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Role->exists($id)) {
			throw new NotFoundException(__('Invalid role'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Role->save($this->request->data)) {
				$this->Session->setFlash(__('El rol ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El rol no se pudo guardar. Intente nuevamente.'));
			}
		} else {
			$options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
			$this->request->data = $this->Role->find('first', $options);
		}
	}

/**
 * Método de administrador que elimina un rol del sistema
 *
 * @param int $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Role->id = $id;
		if (!$this->Role->exists()) {
			throw new NotFoundException(__('Invalid role'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Role->delete()) {
			$this->Session->setFlash(__('El rol ha sido guardado.'));
		} else {
			$this->Session->setFlash(__('El rol no se pudo eliminar. Intente nuevamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
