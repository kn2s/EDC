<?php
App::uses('Homepagecontent', 'Model');

/**
 * Homepagecontent Test Case
 */
class HomepagecontentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.homepagecontent'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Homepagecontent = ClassRegistry::init('Homepagecontent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Homepagecontent);

		parent::tearDown();
	}

}
