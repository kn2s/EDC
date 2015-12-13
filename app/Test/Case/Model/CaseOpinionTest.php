<?php
App::uses('CaseOpinion', 'Model');

/**
 * CaseOpinion Test Case
 */
class CaseOpinionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.case_opinion',
		'app.doctor_case',
		'app.patient',
		'app.patient_detail',
		'app.country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CaseOpinion = ClassRegistry::init('CaseOpinion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CaseOpinion);

		parent::tearDown();
	}

}
