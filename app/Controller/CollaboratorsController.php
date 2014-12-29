<?php
App::uses('AppController', 'Controller');

class CollaboratorsController extends AppController {


	public $components = array('Paginator', 'Session');
	var $helpers = array('Js');

	public $uses = array('Collaborator', 'Career','Answer','Question');



/**
 * Método que lista los colaboradores
 *
 * @return void
 */
	public function collaborators() {
		$this->layout = 'page';
		$this->Collaborator->recursive = 0;
		$this->set('users', $this->Paginator->paginate(array(
            'role_id' => 2,
        
    )));
	}

/**
 * Método que muestra  el perfil público de un colaboradore
 *
 * @return void
 */
	public function public_resume($user_id) {
		
	$this->layout = 'page';	
    $this->Collaborator->recursive = 0;
	$options = array('conditions' => array('Collaborator.' . $this->Collaborator->primaryKey => $user_id));
	$this->set('user', $this->Collaborator->find('first', $options));

		$careers = $this->Collaborator->Career->find('list');
		$this->set(compact('careers'));
	}

	/**
 * Método que enlaza un perfil privado con uno público
 *
 * @return void
 */

	public function prev_resume($user_id)
	{
		$this->autoRender = false;
		$this->Collaborator->addView($user_id);
		$this->redirect('/users/public_resume/'.$user_id);

	}


/**
 * Método que muestra el perfil privado de un colaborador
 *
 * @return void
 */
	public function resume($collaborator_id) {
		
	$this->layout = 'page';	

	$options = array('conditions' => array('Collaborator.' . $this->Collaborator->primaryKey => $collaborator_id));
	$this->set('collaborator', $this->Collaborator->find('first', $options));
	}


		

/**
 * Método de administrador que lista los colaboradores
 *
 * @return void
 */
	public function admin_index() {
		$this->Collaborator->recursive = 0;
		$this->Paginator = $this->Components->load('Paginator');
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * Método de administrador que muestra un colaborador
 *
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Collaborator->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('Collaborator.' . $this->Collaborator->primaryKey => $id));
		$this->set('user', $this->Collaborator->find('first', $options));
	}

/**
 * Método de administrador que agrega un colaborador
 *
 * @return void
 */
	public function admin_add() {
		$this->Session->setFlash(__('El colaborador no se ha guardado.Intente nuevamente.'));
		if ($this->request->is('post')) {
			$this->Collaborator->create();
			if ($this->Collaborator->save($this->request->data)) {
				$this->Session->setFlash(__('El colaborador ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$genders = $this->Collaborator->Gender->find('list');
		$careers = $this->Collaborator->Career->find('list');
		$roles = $this->Collaborator->Role->find('list');
		$this->set(compact('genders', 'careers', 'roles'));
	}

/**
 * Método de administrador que edita un colaborador
 *
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Collaborator->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Collaborator->save($this->request->data)) {
				$this->Session->setFlash(__('El colaborador ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El colaborador no se ha guardado.Intente nuevamente.'));
			}
		} else {
			$options = array('conditions' => array('Collaborator.' . $this->Collaborator->primaryKey => $id));
			$this->request->data = $this->Collaborator->find('first', $options);
		}
		$genders = $this->Collaborator->Gender->find('list');
		$careers = $this->Collaborator->Career->find('list');
		$roles = $this->Collaborator->Role->find('list');
		$this->set(compact('genders', 'careers', 'roles'));
	}

/**
 * Método de administrador que elimina un colaborador
 *
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Collaborator->id = $id;
		if (!$this->Collaborator->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Collaborator->delete()) {
			$this->Session->setFlash(__('El colaborador ha sido borrado.'));
		} else {
			$this->Session->setFlash(__('El colaborador no se ha eliminado. Intente nuevamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
