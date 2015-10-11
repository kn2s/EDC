<?php
App::uses('DrugAlergy', 'Model');

/**
 * DrugAlergy Test Case
 */
class DrugAlergyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.drug_alergy',
		'app.patient_detail',
		'app.patient',
		'app.country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DrugAlergy = ClassRegistry::init('DrugAlergy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DrugAlergy);

		parent::tearDown();
	}

}
