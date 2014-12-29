<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Gender $Gender
 * @property Careers $Careers
 * @property Role $Role
 */
class Collaborator extends AppModel {

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
		));



}
