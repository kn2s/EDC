<?php
App::uses('EmailText', 'Model');

/**
 * EmailText Test Case
 */
class EmailTextTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.email_text'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EmailText = ClassRegistry::init('EmailText');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmailText);

		parent::tearDown();
	}

}
