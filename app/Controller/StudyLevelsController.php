<?php
App::uses('AppController', 'Controller');

class StudyLevelsController extends AppController {


	public $components = array('Paginator', 'Session');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->StudyLevel->recursive = 0;
		$this->set('studyLevels', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->StudyLevel->exists($id)) {
			throw new NotFoundException(__('Invalid study level'));
		}
		$options = array('conditions' => array('StudyLevel.' . $this->StudyLevel->primaryKey => $id));
		$this->set('studyLevel', $this->StudyLevel->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->StudyLevel->create();
			if ($this->StudyLevel->save($this->request->data)) {
				$this->Session->setFlash(__('The study level has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The study level could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->StudyLevel->exists($id)) {
			throw new NotFoundException(__('Invalid study level'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StudyLevel->save($this->request->data)) {
				$this->Session->setFlash(__('The study level has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The study level could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StudyLevel.' . $this->StudyLevel->primaryKey => $id));
			$this->request->data = $this->StudyLevel->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->StudyLevel->id = $id;
		if (!$this->StudyLevel->exists()) {
			throw new NotFoundException(__('Invalid study level'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StudyLevel->delete()) {
			$this->Session->setFlash(__('The study level has been deleted.'));
		} else {
			$this->Session->setFlash(__('The study level could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
