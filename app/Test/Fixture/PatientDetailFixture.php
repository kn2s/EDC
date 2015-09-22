<?php
/**
 * PatientDetail Fixture
 */
class PatientDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'length' => 11, 'unsigned' => false, 'key' => 'primary'),
		'patient_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'length' => 11, 'unsigned' => false),
		'name' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 254, 'unsigned' => false),
		'gender' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 254, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'dob_month' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => false),
		'dob_day' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => false),
		'dob_year' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'unsigned' => false),
		'weight' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'unit in kg'),
		'height' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'unit in cm'),
		'city' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 254, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'state' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 254, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'country_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => false),
		'performance' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'performance_comment' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'isactive' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1, 'unsigned' => true),
		'isdeleted' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1, 'unsigned' => true),
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
			'id' => '',
			'patient_id' => '',
			'name' => 1,
			'gender' => 'Lorem ipsum dolor sit amet',
			'dob_month' => 1,
			'dob_day' => 1,
			'dob_year' => 1,
			'weight' => 1,
			'height' => 1,
			'city' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet',
			'country_id' => 1,
			'performance' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'performance_comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'isactive' => 1,
			'isdeleted' => 1
		),
	);

}
