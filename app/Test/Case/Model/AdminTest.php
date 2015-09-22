<?php
App::uses('Admin', 'Model');

/**
 * Admin Test Case
 */
class AdminTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.admin'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Admin = ClassRegistry::init('Admin');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Admin);

		parent::tearDown();
	}

}
