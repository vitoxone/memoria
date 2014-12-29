<?php
App::uses('StudyLevel', 'Model');

/**
 * StudyLevel Test Case
 *
 */
class StudyLevelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.study_level',
		'app.user',
		'app.gender',
		'app.career',
		'app.role'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StudyLevel = ClassRegistry::init('StudyLevel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StudyLevel);

		parent::tearDown();
	}

}
