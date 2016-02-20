<?php
App::uses('SampleQuestionnaire', 'Model');

/**
 * SampleQuestionnaire Test Case
 */
class SampleQuestionnaireTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sample_questionnaire'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SampleQuestionnaire = ClassRegistry::init('SampleQuestionnaire');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SampleQuestionnaire);

		parent::tearDown();
	}

}
