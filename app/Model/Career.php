<?php
App::uses('AppModel', 'Model');
/**
 * Career Model
 *
 */
class Career extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';



/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'careers_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
