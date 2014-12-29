<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Gender $Gender
 * @property Careers $Careers
 * @property Role $Role
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';





	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Gender' => array(
			'className' => 'Gender',
			'foreignKey' => 'gender_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Career' => array(
			'className' => 'Career',
			'foreignKey' => 'careers_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'StudyLevel' => array(
			'className' => 'StudyLevel',
			'foreignKey' => 'study_level_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


		public function addView($id) {

		$this->updateAll(
			array(
				'User.views' => 'User.views + 1',
			),
			array('User.id' => $id)
		);
		}

		public function addLike($id) {

		$this->updateAll(
			array(
				'User.likes' => 'User.likes + 1',
			),
			array('User.id' => $id)
		);
		}


		public function Verificate($rut) {

		$total = $this->find('count', array('conditions'=>"User.rut = $rut"));
		
		if($total != 0){
			return false;
		}
		else return true;
		}



}
