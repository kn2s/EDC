<?php
App::uses('Reference', 'Model');

/**
 * Reference Test Case
 */
class ReferenceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reference'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Reference = ClassRegistry::init('Reference');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Reference);

		parent::tearDown();
	}

}
