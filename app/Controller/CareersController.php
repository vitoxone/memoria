<?php
App::uses('AppController', 'Controller');

class CareersController extends AppController {


	public $components = array('Paginator', 'Session');

	public $uses = array('Career', 'User', 'Collaborator');

/**
 * Método que calcula y despliega los perfiles de carrera
 *
 * @return void
 */
	public function profiles() {
	$start_time= microtime(true);
		
	$this->layout = 'page';	
	$this->Career->recursive = 0;
	$careers = $this->Career->find('all', array('conditions'=>"Career.id != 1",'limit' => 25,'order'=>'Career.total_collaborators DESC'));
	
	$finish_time= microtime(true);
	$time = $finish_time-$start_time ;
$time = "Tiempo empleado: " . ($finish_time - $start_time)*1000 . " segundos"; 

	$this->set(compact('careers', 'time'));

	}


/**
 * Método que calcula los parámetros para el uso del algoritmo bayesiano
 *
 * @return void
 */
	public function bayesParameters() {

		//$this->autoRender = false;
		$this->Career->recursive = 0;
		//$careers = $this->Career->find('all');
		//$careers = $this->Career->find('all', array('Career.id' != 1));
		$careers = $this->Career->find('all', array('conditions'=>"Career.id != 1"));


		//$careers = $this->Career->query("select * from careers where careers.id != 1");
		//$results = $this->Order->query("select * from orders order by date");
	


		$i=0;
		$data = array();
		foreach($careers as $u){
			$asd = $u['Career']['id'];			
			$number = $this->User->find('count', array('conditions' => array('User.careers_id' => $asd)));
			//$media =  $this->User->find('all', array("fields"     => array("AVG(User.active_style)"),'conditions' => array('User.careers_id' => $asd)));
			
			//valores medios totales
			$mediaA = $this->getActiveMean($asd);
			$mediaR = $this->getReflexiveMean($asd);
			$mediaT = $this->getTheoritsMean($asd);
			$mediaP = $this->getPragmaticMean($asd);

			//valores medias Hombres

			$mediaAMen = $this->getActiveMeanMen($asd);
			$mediaRMen = $this->getReflexiveMeanMen($asd);
			$mediaTMen = $this->getTheoritsMeanMen($asd);
			$mediaPMen = $this->getPragmaticMeanMen($asd);

			//valores medias Mujeres

			$mediaAWoman = $this->getActiveMeanWoman($asd);
			$mediaRWoman = $this->getReflexiveMeanWoman($asd);
			$mediaTWoman = $this->getTheoritsMeanWoman($asd);
			$mediaPWoman = $this->getPragmaticMeanWoman($asd);

			$varianceA = $this->getActiveVariance($asd);
			$varianceR = $this->getReflexiveVariance($asd);
			$varianceT = $this->getTheoritsVariance($asd);
			$varianceP  = $this->getPragmaticVariance($asd);


			$varianceAMen = $this->getActiveVarianceMen($asd);
			$varianceRMen = $this->getReflexiveVarianceMen($asd);
			$varianceTMen = $this->getTheoritsVarianceMen($asd);
			$variancePMen  = $this->getPragmaticVarianceMen($asd);

			$varianceAWoman = $this->getActiveVarianceWoman($asd);
			$varianceRWoman = $this->getReflexiveVarianceWoman($asd);
			$varianceTWoman = $this->getTheoritsVarianceWoman($asd);
			$variancePWoman  = $this->getPragmaticVarianceWoman($asd);

			$probability = $this->getProbability($asd);
			//$probabilityMen = $this->getProbabilityMen($asd);
			//$probabilityWoman = $this->getProbabilityWoman($asd);

			
			$this->Career->create();

			$this->request->data['Career']['id'] = $u['Career']['id'];	
			$this->request->data['Career']['total_collaborators'] = $number;

			$this->request->data['Career']['active_mean'] = $mediaA;
			$this->request->data['Career']['reflexive_mean'] = $mediaR;
			$this->request->data['Career']['theorist_mean'] = $mediaT;
			$this->request->data['Career']['pragmatic_mean'] = $mediaP;

			$this->request->data['Career']['active_mean_men'] = $mediaAMen;
			$this->request->data['Career']['reflexive_mean_men'] = $mediaRMen;
			$this->request->data['Career']['theorist_mean_men'] = $mediaTMen;
			$this->request->data['Career']['pragmatic_mean_men'] = $mediaPMen;

			$this->request->data['Career']['active_mean_woman'] = $mediaAWoman;
			$this->request->data['Career']['reflexive_mean_woman'] = $mediaRWoman;
			$this->request->data['Career']['theorist_mean_woman'] = $mediaTWoman;
			$this->request->data['Career']['pragmatic_mean_woman'] = $mediaPWoman;

			$this->request->data['Career']['active_variance'] = $varianceA;
			$this->request->data['Career']['reflexive_variance'] = $varianceR;
			$this->request->data['Career']['theorist_variance'] = $varianceT;
			$this->request->data['Career']['pragmatic_variance'] = $varianceP;

			$this->request->data['Career']['active_variance_men'] = $varianceAMen;
			$this->request->data['Career']['reflexive_variance_men'] = $varianceRMen;
			$this->request->data['Career']['theorist_variance_men'] = $varianceTMen;
			$this->request->data['Career']['pragmatic_variance_men'] = $variancePMen;

			$this->request->data['Career']['active_variance_woman'] = $varianceAWoman;
			$this->request->data['Career']['reflexive_variance_woman'] = $varianceRWoman;
			$this->request->data['Career']['theorist_variance_woman'] = $varianceTWoman;
			$this->request->data['Career']['pragmatic_variance_woman'] = $variancePWoman;

			$this->request->data['Career']['probability'] = $probability;

			$this->Career->save($this->request->data);
			$i++;
		}

		//$this->set(compact('dates'));

	}




/**
 * Método que utiliza los parametros para relalizar los calculos de naive bayes
 *
 * @return void
 */
	public function calculos() {
		$start_time= microtime(true);

		$this->bayesParameters();

		$this->Career->recursive = 0;
		//$careers = $this->Career->find('all');
		//$careers = $this->Career->find('all', array('Career.id' != 1));
		$careers = $this->Career->find('all', array('conditions'=>"Career.id != 1"));


		//$careers = $this->Career->query("select * from careers where careers.id != 1");
		//$results = $this->Order->query("select * from orders order by date");
	


		$i=0;
		$data = array();
		foreach($careers as $u){
			$asd = $u['Career']['id'];			
			$number = $this->User->find('count', array('conditions' => array('User.careers_id' => $asd)));
			//$media =  $this->User->find('all', array("fields"     => array("AVG(User.active_style)"),'conditions' => array('User.careers_id' => $asd)));
			$mediaA = $this->getActiveMean($asd);
			$mediaR = $this->getReflexiveMean($asd);
			$mediaT = $this->getTheoritsMean($asd);
			$mediaP = $this->getPragmaticMean($asd);

			$varianceA = $this->getActiveVariance($asd);
			$varianceR = $this->getReflexiveVariance($asd);
			$varianceT = $this->getTheoritsVariance($asd);
			$varianceP  = $this->getPragmaticVariance($asd);

			$probability = $this->getProbability($asd);

			 $dates[] = array('career_id'=>$u['Career']['id'], 'career_name'=> $u['Career']['name'], 'collaborations'=> $number,
			  'mediaA'=>$mediaA, 'mediaR'=>$mediaR, 'mediaT'=>$mediaT, 'mediaP'=>$mediaP,
			  'varianceA'=>$varianceA, 'varianceR'=>$varianceR, 'varianceT'=>$varianceT, 'varianceP'=>$varianceP,
			  'probability'=>$probability);
			$i++;
		}
			$finish_time= microtime(true);
			$time = $finish_time-$start_time ;
			$time = "Tiempo empleado: " . ($finish_time - $start_time) . " segundos"; 


		$this->set(compact('dates','time'));
	}



//--------------CALCULO DE MEDIAS  -----------------------------------------------------------------------------
	
//Activo
	//------------------------------------------------------------------------
	public function getActiveMean($career_id){
  	$foo = $this->User->query("select avg(active_style) as active from users"
  	. " where careers_id = '" . $career_id . "'");
  	return $foo[0][0]['active'];
	}

	public function getActiveMeanMen($career_id){
  	$foo = $this->User->query("select avg(active_style) as active from users"
  	. " where careers_id = '" . $career_id . "' and gender_id = 2");
  	return $foo[0][0]['active'];
	}

	public function getActiveMeanWoman($career_id){
  	$foo = $this->User->query("select avg(active_style) as active from users"
  	. " where careers_id = '" . $career_id . "' and gender_id = 3");
  	return $foo[0][0]['active'];
	}

//Reflexivo
	//------------------------------------------------------------------------
	public function getReflexiveMean($career_id){
  	$foo = $this->User->query("select avg(reflexive_style) as active from users"
  	. " where careers_id = '" . $career_id . "'");
  	return $foo[0][0]['active'];
	}

	public function getReflexiveMeanMen($career_id){
  	$foo = $this->User->query("select avg(reflexive_style) as active from users"
  	. " where careers_id = '" . $career_id . "'and gender_id = 2");
  	return $foo[0][0]['active'];
	}
	public function getReflexiveMeanWoman($career_id){
  	$foo = $this->User->query("select avg(reflexive_style) as active from users"
  	. " where careers_id = '" . $career_id . "'and gender_id = 3");
  	return $foo[0][0]['active'];
	}

//Teórico
	//------------------------------------------------------------------------

	public function getTheoritsMean($career_id){

  	$foo = $this->User->query("select avg(theorist_style) as active from users"
  	. " where careers_id = '" . $career_id . "'");
  	return $foo[0][0]['active'];
	}
	public function getTheoritsMeanMen($career_id){
		$foo = $this->User->query("select avg(theorist_style) as active from users"
  	. " where careers_id = '" . $career_id . "'and gender_id = 2");
  	return $foo[0][0]['active'];
	}
	public function getTheoritsMeanWoman($career_id){
		$foo = $this->User->query("select avg(theorist_style) as active from users"
  	. " where careers_id = '" . $career_id . "'and gender_id = 3");
  	return $foo[0][0]['active'];
	}

	//Pragmático
	//------------------------------------------------------------------------


	public function getPragmaticMean($career_id){
    $foo = $this->User->query("select avg(pragmatic_style) as active from users"
  	. " where careers_id = '" . $career_id . "'");
  	return $foo[0][0]['active'];
	}

	public function getPragmaticMeanMen($career_id){
    $foo = $this->User->query("select avg(pragmatic_style) as active from users"
  	. " where careers_id = '" . $career_id . "'and gender_id = 2");
  	return $foo[0][0]['active'];
	}

	public function getPragmaticMeanWoman($career_id){
    $foo = $this->User->query("select avg(pragmatic_style) as active from users"
  	. " where careers_id = '" . $career_id . "'and gender_id = 3");
  	return $foo[0][0]['active'];
	}

//-------------- CALCULO DE VARIANZAS --------------------------------------------
	//Activo
	//------------------------------------------------------------------------

	public function getActiveVariance($career_id){
  	$foo = $this->User->query("select VAR_SAMP(active_style) as active from users"
  	. " where careers_id = '" . $career_id . "'");
  	return $foo[0][0]['active'];
	}

	public function getActiveVarianceMen($career_id){
  	$foo = $this->User->query("select VAR_SAMP(active_style) as active from users"
  	. " where careers_id = '" . $career_id . "'and gender_id = 2");
  	return $foo[0][0]['active'];
	}

	public function getActiveVarianceWoman($career_id){
  	$foo = $this->User->query("select VAR_SAMP(active_style) as active from users"
  	. " where careers_id = '" . $career_id . "'and gender_id = 3");
  	return $foo[0][0]['active'];
	}

	//Reflexivo
	//------------------------------------------------------------------------


	public function getReflexiveVariance($career_id){
  	$foo = $this->User->query("select VAR_SAMP(reflexive_style) as active from users"
  	. " where careers_id = '" . $career_id . "'");
  	return $foo[0][0]['active'];
	}

	public function getReflexiveVarianceMen($career_id){
  	$foo = $this->User->query("select VAR_SAMP(reflexive_style) as active from users"
  	. " where careers_id = '" . $career_id . "'and gender_id = 2");
  	return $foo[0][0]['active'];
	}

	public function getReflexiveVarianceWoman($career_id){
  	$foo = $this->User->query("select VAR_SAMP(reflexive_style) as active from users"
  	. " where careers_id = '" . $career_id . "'and gender_id = 3");
  	return $foo[0][0]['active'];
	}

	//Teórico
	//------------------------------------------------------------------------


	public function getTheoritsVariance($career_id){

  	$foo = $this->User->query("select VAR_SAMP(theorist_style) as active from users"
  	. " where careers_id = '" . $career_id . "'");
  	return $foo[0][0]['active'];
	}

	public function getTheoritsVarianceMen($career_id){

  	$foo = $this->User->query("select VAR_SAMP(theorist_style) as active from users"
  	. " where careers_id = '" . $career_id . "'and gender_id = 2");
  	return $foo[0][0]['active'];
	}

	public function getTheoritsVarianceWoman($career_id){

  	$foo = $this->User->query("select VAR_SAMP(theorist_style) as active from users"
  	. " where careers_id = '" . $career_id . "'and gender_id = 3");
  	return $foo[0][0]['active'];
	}

	//Pragmático
	//------------------------------------------------------------------------


	public function getPragmaticVariance($career_id){
    $foo = $this->User->query("select VAR_SAMP(pragmatic_style) as active from users"
  	. " where careers_id = '" . $career_id . "'");
  	return $foo[0][0]['active'];
	}

	public function getPragmaticVarianceMen($career_id){
    $foo = $this->User->query("select VAR_SAMP(pragmatic_style) as active from users"
  	. " where careers_id = '" . $career_id . "'and gender_id = 2");
  	return $foo[0][0]['active'];
	}

	public function getPragmaticVarianceWoman($career_id){
    $foo = $this->User->query("select VAR_SAMP(pragmatic_style) as active from users"
  	. " where careers_id = '" . $career_id . "'and gender_id = 3");
  	return $foo[0][0]['active'];
	}

	public function getProbability($career_id){

		$number = $this->User->find('count', array('conditions' => array('User.careers_id' => $career_id)));
		$total = $this->User->find('count');

		return($number/($total-1));

	}


/**
 * Método que despliega el resultado de los calculos del algoritmo
 * @param $collaborator_id
 * @return void
 */

public function result($collaborator_id){

		$this->layout = 'page';

		$c= $this->Collaborator->find('first', array('conditions' => array('Collaborator.id' => $collaborator_id)));

		$this->Career->recursive = 0;
		$careers = $this->Career->find('all', array('conditions'=>"Career.id != 1"));
	

		$posteriori_total = 0;

		foreach($careers as $career):

			$probability = $career['Career']['probability'];

		    if($probability != 0){

		//	$pActive = $this->naiveBayes($career['Career']['active_variance'], $career['Career']['active_mean'], $c['Collaborator']['active_style']  );

		//	$pReflexive = $this->naiveBayes($career['Career']['reflexive_variance'], $career['Career']['reflexive_mean'], $c['Collaborator']['reflexive_style']  );

		//	$pTheorist = $this->naiveBayes($career['Career']['theorist_variance'], $career['Career']['theorist_mean'], $c['Collaborator']['theorist_style']  );

		//	$pPragmatic = $this->naiveBayes($career['Career']['pragmatic_variance'], $career['Career']['pragmatic_mean'], $c['Collaborator']['pragmatic_style']  );



			//Si es hombre

			if($c['Collaborator']['gender_id'] == 2){

			$mediaA = $career['Career']['active_mean_men'];
			$mediaR = $career['Career']['reflexive_mean_men'];	
			$mediaT = $career['Career']['theorist_mean_men'];	
			$mediaP = $career['Career']['pragmatic_mean_men'];	

			//LLAMADOS PARA NAIVE BAYES GAUSSIANO	
		
			$pActive = $this->naiveBayes($career['Career']['active_variance_men'], $career['Career']['active_mean_men'], $c['Collaborator']['active_style']  );

			$pReflexive = $this->naiveBayes($career['Career']['reflexive_variance_men'], $career['Career']['reflexive_mean_men'], $c['Collaborator']['reflexive_style']  );

			$pTheorist = $this->naiveBayes($career['Career']['theorist_variance_men'], $career['Career']['theorist_mean_men'], $c['Collaborator']['theorist_style']  );

			$pPragmatic = $this->naiveBayes($career['Career']['pragmatic_variance_men'], $career['Career']['pragmatic_mean_men'], $c['Collaborator']['pragmatic_style']  );/*

				//LLAMADOS PARA NAIVE BAYES POISSON	

			$pActive = $this->naivePoisson($career['Career']['active_mean_men'], $c['Collaborator']['active_style']  );

			$pReflexive = $this->naivePoisson( $career['Career']['reflexive_mean_men'], $c['Collaborator']['reflexive_style']  );

			$pTheorist = $this->naivePoisson( $career['Career']['theorist_mean_men'], $c['Collaborator']['theorist_style']  );

			$pPragmatic = $this->naivePoisson( $career['Career']['pragmatic_mean_men'], $c['Collaborator']['pragmatic_style']  );
*/
			}

			//Si es mujer

			if($c['Collaborator']['gender_id'] == 3){

			$mediaA = $career['Career']['active_mean_woman'];
			$mediaR = $career['Career']['reflexive_mean_woman'];	
			$mediaT = $career['Career']['theorist_mean_woman'];	
			$mediaP = $career['Career']['pragmatic_mean_woman'];	


			//LLAMADOS PARA NAIVE BAYES GAUSSIANO

			$pActive = $this->naiveBayes($career['Career']['active_variance_woman'], $career['Career']['active_mean_woman'], $c['Collaborator']['active_style']  );

			$pReflexive = $this->naiveBayes($career['Career']['reflexive_variance_woman'], $career['Career']['reflexive_mean_woman'], $c['Collaborator']['reflexive_style']  );

			$pTheorist = $this->naiveBayes($career['Career']['theorist_variance_woman'], $career['Career']['theorist_mean_woman'], $c['Collaborator']['theorist_style']  );

			$pPragmatic = $this->naiveBayes($career['Career']['pragmatic_variance_woman'], $career['Career']['pragmatic_mean_woman'], $c['Collaborator']['pragmatic_style']  );/*

			//LLAMADOS PARA NAIVE BAYES POISSON

			$pActive = $this->naivePoisson($career['Career']['active_mean_woman'], $c['Collaborator']['active_style']  );

			$pReflexive = $this->naivePoisson($career['Career']['reflexive_mean_woman'], $c['Collaborator']['reflexive_style']  );

			$pTheorist = $this->naivePoisson($career['Career']['theorist_mean_woman'], $c['Collaborator']['theorist_style']  );

			$pPragmatic = $this->naivePoisson( $career['Career']['pragmatic_mean_woman'], $c['Collaborator']['pragmatic_style']  );
*/
			}


				


			$posteriori = $probability * $pActive * $pReflexive * $pTheorist * $pPragmatic;

			$posteriori_total = $posteriori_total + $posteriori; 

			$dates[] = array('name'=>$career['Career']['name'],
							 'campus'=>$career['Career']['campus'],
							 'details'=>$career['Career']['details'],
							 'img'=>$career['Career']['img'],
							 'webpage'=>$career['Career']['webpage'],
							 'posteriori'=> $posteriori,
							 'pActive'=> $pActive,
							 'pReflexive'=> $pReflexive,
							 'pTheorist'=> $pTheorist,
							 'pPragmatic'=> $pPragmatic,
							 'probability'=> $probability,
							 'mediaA'=> $mediaA,
							 'mediaR'=> $mediaR,
							 'mediaT'=> $mediaT,
							 'mediaP'=> $mediaP
							 );
		}
	    endforeach; 

	   // $dates = array('posteriori'=> 5,'posteriori'=> 8,'posteriori'=> 1,'posteriori'=> 2);
	    $dates = $this->order($dates,count($dates));

	    $posteriori_total = $this->calculateRating($dates,count($dates));

   		$this->set(compact('dates', 'posteriori_total'));
		//$this->set(compact('dates'), $this->paginate());
	}



/**
 * Método que calcula naive bayes distribucion normal
 * @param $v, $u, $value
 * @return void
 */
	public function naiveBayes($v, $u, $value){

		if($v == 0){
			$v = 1;
		}

		$p1 = 1/sqrt(2*pi()*$v);

		$p2 = (-1)*pow(($value-$u),2);

		$p3 = 2*$v;


		//return pow($p1, ($p2/$p3));

		return $p1* exp($p2/$p3);

	}

	/**
 * Método que calcula naive bayes distribucion Poisson
 * @param $u, $value
 * @return void
 */

	public function naivePoisson($u, $value){


		$p1 = exp(-$u);

		$p2 = pow(($u),$value);

		$p3 = $this->factorial($value);

		return $p1*($p2/$p3);

	}

/**
 * Método que el factorial para la formula de  naive bayes Normal
 * @param $numero
 * @return void
 */

	function factorial($numero){	
		for($i = $numero-1; $i > 0; $i--){
			$numero *= $i;
		}
		return $numero;
}


/**
 * Método que calcula el rating de la carrera luego de la clasificacion
 * @param $u, $value
 * @return void
 */
	function calculateRating($A,$n)
    {
 
 		$total = 0;
        for ($i = 0; $i < $n; $i++)
        {
        	$total = $total + $A[$i]['posteriori'];
        }

        return $total;

    }

	/**
 * Método que utiliza inserion sort para ordenar luego de la clasiciacion
 * @param $A, $n
 * @return $A n carreras ordenadas de mayor a menor
 */

	function order($A,$n)
    {
 
        for ($i = 1; $i < $n; $i++)
        {
                 $v = $A[$i];
                 $j = $i - 1;
                 while ($j >= 0 && $A[$j]['posteriori'] < $v['posteriori'])
                 {
                          $A[$j + 1] = $A[$j];
                          $j--;
                 }
 
                 $A[$j + 1] = $v;
        }
 
        return $A;
    }




/**
 * Método de administrador que lista las carreras
 *
 * @return void
 */
public function admin_index() {
		$this->Paginator = $this->Components->load('Paginator');
		$this->set('careers', $this->Paginator->paginate());
	}

/**
 * Método de administrador que realiza calulos periodicos
 *
 * @return void
 */
public function admin_calculos() {
		$this->Career->recursive = 0;
		$careers = $this->Career->find('all', array('conditions'=>"Career.id != 1"));
		$this->set(compact('careers'));
	}

/**
 * Método de administrador que muestra una carrera
 *
 * @return void
 */
	public function admin_view($id = null) {
		$this->layout= 'admin';
		if (!$this->Career->exists($id)) {
			throw new NotFoundException(__('Invalid career'));
		}
		$options = array('conditions' => array('Career.' . $this->Career->primaryKey => $id));
		$this->set('career', $this->Career->find('first', $options));
	}

/**
 * Método de administrador que agrega una carrera
 *
 * @return void
 */
	public function admin_add() {
		$this->layout= 'admin';
		if ($this->request->is('post')) {
			$this->Career->create();
			if ($this->Career->save($this->request->data)) {
				$this->Session->setFlash(__('La carrera ha sido guardada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La carrera no se guardó. Intente nuevamente.'));
			}
		}
	}

/**
 * Método de administrador que edita una carrera
 *
 * @return void
 */
	public function admin_edit($id = null) {
		$this->layout= 'admin';
		if (!$this->Career->exists($id)) {
			throw new NotFoundException(__('Invalid career'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Career->save($this->request->data)) {
				$this->Session->setFlash(__('La carrera ha sido guardada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La carrera no se guardó. Intente nuevamente.'));
			}
		} else {
			$options = array('conditions' => array('Career.' . $this->Career->primaryKey => $id));
			$this->request->data = $this->Career->find('first', $options);
		}
	}

/**
 * Método de administrador que elimina una carrera
 *
 * @return void
 */
	public function admin_delete($id = null) {
		$this->layout= 'admin';
		$this->Career->id = $id;
		if (!$this->Career->exists()) {
			throw new NotFoundException(__('Invalid career'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Career->delete()) {
			$this->Session->setFlash(__('La carrera ha sido eliminada'));
		} else {
			$this->Session->setFlash(__('La carrera no se eliminó. Intente nuevamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
