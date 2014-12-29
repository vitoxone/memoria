<?php
App::uses('Style', 'Model');

/**
 * Style Test Case
 *
 */
class StyleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.style',
		'app.question',
		'app.test'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Style = ClassRegistry::init('Style');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Style);

		parent::tearDown();
	}

}
