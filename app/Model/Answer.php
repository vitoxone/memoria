<?php
App::uses('AppModel', 'Model');
/**
 * Answer Model
 *
 * @property Questions $Questions
 * @property Users $Users
 */
class Answer extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'value';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'value' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'questions_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'users_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'questions_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'users_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	/* Funcion que retorna la cantidad de mensajes no leidos de un usuario */

	function getType1($id){
		return $this->find('count', array('conditions'=>"Answer.value = 1  AND Answer.question_type =  1 AND Answer.users_id =  $id"));
	}

	function getType2($id){
		return $this->find('count', array('conditions'=>"Answer.value = 1 and Answer.question_type =  2 AND Answer.users_id =  $id"));
	}
	function getType3($id){
		return $this->find('count', array('conditions'=>"Answer.value = 1  and Answer.question_type =  3 AND Answer.users_id =  $id"));
	}
	function getType4($id){
		return $this->find('count', array('conditions'=>"Answer.value = 1 and Answer.question_type =  4 AND Answer.users_id =  $id"));
	}
}
