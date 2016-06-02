<?php
App::uses('SmtpConfig', 'Model');

/**
 * SmtpConfig Test Case
 */
class SmtpConfigTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.smtp_config'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SmtpConfig = ClassRegistry::init('SmtpConfig');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SmtpConfig);

		parent::tearDown();
	}

}
