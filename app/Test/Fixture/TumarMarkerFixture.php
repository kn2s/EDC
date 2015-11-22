<?php
/**
 * TumarMarker Fixture
 */
class TumarMarkerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'about_illness_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 254, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tumormonth' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'tumoryear' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'tumorresult' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 254, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'about_illness_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'tumormonth' => 1,
			'tumoryear' => 1,
			'tumorresult' => 'Lorem ipsum dolor sit amet'
		),
	);

}
