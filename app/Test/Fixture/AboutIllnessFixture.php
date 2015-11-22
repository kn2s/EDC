<?php
/**
 * AboutIllness Fixture
 */
class AboutIllnessFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'about_illness';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'patient_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true),
		'principle_diagonisises_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'startdiagomonth' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'startdiagoday' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'startdiagoyear' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'enddiagomonth' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'enddiagoyear' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'enddiagoday' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'diagodetails' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'diagorecomandation' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'istumarmarker' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'tumartype' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 256, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tumarmonth' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'tumoryear' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'tumarresult' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 254, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'patient_id' => 1,
			'principle_diagonisises_id' => 1,
			'startdiagomonth' => 1,
			'startdiagoday' => 1,
			'startdiagoyear' => 1,
			'enddiagomonth' => 1,
			'enddiagoyear' => 1,
			'enddiagoday' => 1,
			'diagodetails' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'diagorecomandation' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'istumarmarker' => 1,
			'tumartype' => 'Lorem ipsum dolor sit amet',
			'tumarmonth' => 1,
			'tumoryear' => 1,
			'tumarresult' => 'Lorem ipsum dolor sit amet'
		),
	);

}
