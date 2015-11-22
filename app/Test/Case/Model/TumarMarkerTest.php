<?php
App::uses('TumarMarker', 'Model');

/**
 * TumarMarker Test Case
 */
class TumarMarkerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tumar_marker',
		'app.about_illness',
		'app.patient',
		'app.patient_detail',
		'app.country',
		'app.principle_diagonisises'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TumarMarker = ClassRegistry::init('TumarMarker');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TumarMarker);

		parent::tearDown();
	}

}
