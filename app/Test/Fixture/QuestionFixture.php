<?php
/**
 * QuestionFixture
 *
 */
class QuestionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tests_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'active' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1),
		'created' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'modified' => array('type' => 'timestamp', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'tests_id' => 1,
			'active' => 1,
			'created' => 1396584225,
			'modified' => 1396584225
		),
	);

}
