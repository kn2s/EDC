<?php
/**
 * DoctorHoliday Fixture
 */
class DoctorHolidayFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'doct_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'holidaydate' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'doct_id' => 1,
			'holidaydate' => 1
		),
	);

}
