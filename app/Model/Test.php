<?php
App::uses('AppModel', 'Model');
/**
 * Test Model
 *
 */
class Test extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';



		public $hasMany = array(
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'test_id',
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
