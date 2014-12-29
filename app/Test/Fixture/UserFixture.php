<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 100),
		'rut' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'gender_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1),
		'careers_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'role_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1),
		'year' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'modified' => array('type' => 'timestamp', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_users_careers1' => array('column' => 'careers_id', 'unique' => 0)
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
			'name' => 1,
			'rut' => 'Lorem ip',
			'gender_id' => 1,
			'careers_id' => 1,
			'role_id' => 1,
			'year' => 'Lorem ipsum dolor sit amet',
			'created' => 1396584161,
			'modified' => 1396584161
		),
	);

}
