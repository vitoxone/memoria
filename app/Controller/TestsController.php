<?php
App::uses('AppController', 'Controller');
/**
 * Tests Controller
 *
 * @property Test $Test
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TestsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Email');


	public $uses = array('Test','Question', 'Answer', 'Gender','StudyLevel','User', 'Career', 'Collaborator');





///////////////////////////////////////////////////////////////
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('evaluar');
	}
//////////////////////////////////////////////////////////////


/**
 * Método que genera el test para usuarios externos
 *
 * @return void
 */
		public function quiz() {
			$this->layout = 'page';
			$active = 0;
			$reflexive = 0;
			$theorist = 0;
			$pragmatic = 0;

		if ($this->request->is('post')) {

			$this->Collaborator->create();
			//Se calcula el puntaje del usuario a partir de sus respuestas

			foreach ($this->request->data['Answer'] as $answer) {
	          		if($answer['value'] == 1){
	          			if($answer['question_type'] == 1){

	          				$active++;
	          			}
	          			if($answer['question_type'] == 2){

	          				$reflexive++;
	          			}
	          			if($answer['question_type'] == 3){

	          				$theorist++;
	          			}
	          			if($answer['question_type'] == 4){

	          				$pragmatic++;
	          			}

	          			}		
	                }

	              $this->request->data['Collaborator']['active_style'] = $active;
	              $this->request->data['Collaborator']['reflexive_style'] = $reflexive;
	              $this->request->data['Collaborator']['theorist_style'] = $theorist;
	              $this->request->data['Collaborator']['pragmatic_style'] = $pragmatic;

			//Comprueba si el rut ya se encuentra ingresado en la base de datos
				$this->Collaborator->save($this->request->data);
					$collaborator_id = $this->Collaborator->getInsertId();
					//$this->sendEmail($this->request->data['User']['email'], $this->request->data['User']['img_code'],$user_id );
					$this->redirect('/collaborators/resume/'.$collaborator_id);

					
		}
		$questions = $this->Test->Question->find('all', array('limit' => 5));
		$genders = $this->Gender->find('list');
		$this->set(compact('questions', 'genders'));
	}


/**
 * Método que genera el test para un alumno con código de profesor
 *
 * @return void
 */
	public function collaborate($code = null) {
			$this->layout = 'page';
			$active = 0;
			$reflexive = 0;
			$theorist = 0;
			$pragmatic = 0;

		if ($this->request->is('post')) {

			$this->User->create();
			//print_r($this->request->data);


			//Asignando código de profesor
			if( $code != null){
				$this->request->data['User']['code'] = $code; 
			}

			// Dependiendo del género de la persona se asigna una imagen de hombre o de mujer
			if( $this->request->data['User']['gender_id'] == 2){
				$this->request->data['User']['image'] = 'user_men.jpg'; 
			}
			if($this->request->data['User']['gender_id']  == 3){
				$this->request->data['User']['image'] = 'user_woman.jpg'; 
			}
			//Se genera y guarda el un código de 4 digitos para cambiar la imagen			
			$this->request->data['User']['img_code'] = rand(1000,9999);

			//Se asigna un slug
			$this->request->data['User']['slug'] = $this->request->data['User']['register'].time();


			//Se asigna rol colaborador
			$this->request->data['User']['role_id'] = 2;

			//Se calcula el puntaje del usuario a partir de sus respuestas

			foreach ($this->request->data['Answer'] as $answer) {
	          		if($answer['value'] == 1){
	          			if($answer['question_type'] == 1){

	          				$active++;
	          			}
	          			if($answer['question_type'] == 2){

	          				$reflexive++;
	          			}
	          			if($answer['question_type'] == 3){

	          				$theorist++;
	          			}
	          			if($answer['question_type'] == 4){

	          				$pragmatic++;
	          			}

	          			}		
	                }

	              $this->request->data['User']['active_style'] = $active;
	              $this->request->data['User']['reflexive_style'] = $reflexive;
	              $this->request->data['User']['theorist_style'] = $theorist;
	              $this->request->data['User']['pragmatic_style'] = $pragmatic;

			//Comprueba si el rut ya se encuentra ingresado en la base de datos
			if( $this->User->Verificate($this->request->data['User']['role_id'])){
				$this->User->save($this->request->data);
					$user_id = $this->User->getInsertId();
					// si guarda el reporte tengo que guardar los criterios asociados
	            	//foreach ($this->request->data['Answer'] as $answer) {
	          		//	$answer['users_id']= $user_id;
	          		//	$this->Answer->create();
	          		//	$this->Answer->save($answer);
	                //}
					$this->sendEmail($this->request->data['User']['email'], $this->request->data['User']['img_code'],$user_id );
					$this->redirect('/answers/resume/'.$user_id);

					
				}
		}
		$questions = $this->Test->Question->find('all', array('limit' => 80));
		$genders = $this->Gender->find('list');
		$studylevels = $this->StudyLevel->find('list');
		$careers = $this->Career->find('list');

		$this->set(compact('questions', 'genders','studylevels', 'careers'));
	}


	/**
 * Método que envia un email a al destino señalado
 *
 * @throws NotFoundException
 * @param string $dest, $code, $id
 * @return void
 */

	function sendEmail($dest, $code, $id){

        App::uses('CakeEmail', 'Network/Email');
		$mensaje .= 'Ahora ya puedes cambier tu imagen, tu código es '. $code.' ingresa aquí http://vocacionutalca.curi.co.uk/users/change_image/'.$id;


		CakeEmail::deliver($dest, 'Gracias por colaborar, por favor pon tu foto', $mensaje);
    }

/**
 * Método que genera link para ke profesores compartan el link del test
 *
 * @return void
 */
	public function generate() {
		$this->layout = 'page';

		$code = $this->generateRandomString();
		$link = 'http://localhost/vocacion/tests/collaborate/'.$code;

		$this->set(compact('link','code'));
	}


	/**
 * Método que busca todos los alumnos que realizar el test con un código específico
 *
 * @return void
 */
	public function search() {
		$this->layout = 'page';

		$code = $_POST['fname'];

		$this->User->recursive = 0;
		$users= $this->User->find('all', array('conditions' => array('User.code' => $code)));


		//Se obtienen los datos del gráfico principal
		$i=0;
		$data = array();
		for($j=0; $j<21; $j++){	
			$active= $this->User->find('count', array('conditions' => array('User.active_style' => $j, 'User.code' => $code)));
			$reflexive= $this->User->find('count', array('conditions' => array('User.reflexive_style' => $j, 'User.code' => $code)));	
			$theorist= $this->User->find('count', array('conditions' => array('User.theorist_style' => $j, 'User.code' => $code)));				
			$pragmatic= $this->User->find('count', array('conditions' => array('User.pragmatic_style' => $j, 'User.code' => $code)));	
			$posts[] = array('category'=> $j, 'active'=> $active, 'reflexive' => $reflexive, 'theorist'=> $theorist, 'pragmatic' => $pragmatic);
		}
		$json = json_encode($posts);

		//Se obtienes los datos del gráfico de sexos

		$men= $this->User->find('count', array('conditions' => array('User.gender_id' => 2, 'User.code' => $code)));
		$woman= $this->User->find('count', array('conditions' => array('User.gender_id' => 3, 'User.code' => $code)));	

		$genders[] = array('gender'=> 'hombres', 'total'=> $men);
		$genders[] = array('gender'=> 'mujeres', 'total'=> $woman);
	
		$genders = json_encode($genders);

		//Se obtiene de que carrera son los alumnos
		$careers = $this->Career->find('all');

		$i=0;
		$data = array();
		foreach($careers as $u){
			$asd = $u['Career']['id'];			
			$number= $this->User->find('count', array('conditions' => array('User.careers_id' => $asd, 'User.code' => $code)));			
			 $c[] = array('career'=> $u['Career']['name'], 'number'=> $number);
			$i++;
		}
		$careers = json_encode($c);



		$this->set(compact('code', 'users', 'json', 'genders', 'careers'));
	}

/**
 * Método que genera string aleatorio usado al crear el nuevo usuario colaborador
 *
 * @return void
 */

	function generateRandomString() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < 8; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}



/**
 * Método de administrador que lista los usuarios
 *
 * @return void
 */
	public function admin_index() {
		$this->Test->recursive = 0;
		$this->set('tests', $this->Paginator->paginate());
	}

/**
 * Método de administrador que muestra un usuario
 * @param int $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Test->exists($id)) {
			throw new NotFoundException(__('Invalid test'));
		}
		$options = array('conditions' => array('Test.' . $this->Test->primaryKey => $id));
		$this->set('test', $this->Test->find('first', $options));
	}

/**
 * Método de administrador que agrega un usuario
 * @param int $id
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Test->create();
			if ($this->Test->save($this->request->data)) {
				$this->Session->setFlash(__('The test has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The test could not be saved. Please, try again.'));
			}
		}
	}

/**
 * Método de administrador que edita un usuario
 * @param int $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Test->exists($id)) {
			throw new NotFoundException(__('Invalid test'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Test->save($this->request->data)) {
				$this->Session->setFlash(__('The test has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The test could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Test.' . $this->Test->primaryKey => $id));
			$this->request->data = $this->Test->find('first', $options);
		}
	}

/**
 * Método de administrador que elimina un usuario
 * @param int $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Test->id = $id;
		if (!$this->Test->exists()) {
			throw new NotFoundException(__('Invalid test'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Test->delete()) {
			$this->Session->setFlash(__('The test has been deleted.'));
		} else {
			$this->Session->setFlash(__('The test could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
