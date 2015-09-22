<?php
App::uses('PrincipleDiagonisise', 'Model');

/**
 * PrincipleDiagonisise Test Case
 */
class PrincipleDiagonisiseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.principle_diagonisise'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PrincipleDiagonisise = ClassRegistry::init('PrincipleDiagonisise');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PrincipleDiagonisise);

		parent::tearDown();
	}

}
