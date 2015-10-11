<?php
App::uses('Socialactivity', 'Model');

/**
 * Socialactivity Test Case
 */
class SocialactivityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.socialactivity',
		'app.patient',
		'app.patient_detail',
		'app.country',
		'app.alcohol',
		'app.drug',
		'app.smoking'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Socialactivity = ClassRegistry::init('Socialactivity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Socialactivity);

		parent::tearDown();
	}

}
