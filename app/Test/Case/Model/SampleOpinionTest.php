<?php
App::uses('SampleOpinion', 'Model');

/**
 * SampleOpinion Test Case
 */
class SampleOpinionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sample_opinion'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SampleOpinion = ClassRegistry::init('SampleOpinion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SampleOpinion);

		parent::tearDown();
	}

}
