<?php
/**
 * CommonHoliday Fixture
 */
class CommonHolidayFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'holidayname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 254, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'holidaydate' => array('type' => 'date', 'null' => false, 'default' => null),
		'isactive' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 1, 'unsigned' => false),
		'isdeleted' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'holidayname' => 'Lorem ipsum dolor sit amet',
			'holidaydate' => '2015-12-29',
			'isactive' => 1,
			'isdeleted' => 1
		),
	);

}
