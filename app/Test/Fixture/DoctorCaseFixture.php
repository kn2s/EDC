<?php
/**
 * DoctorCase Fixture
 */
class DoctorCaseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'patient_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'doctor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'casecode' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 256, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'opinion_due_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'available_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'consultant_fee' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'satatus' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'unsigned' => false, 'comment' => '0=un read,1=pending,2=awating input,3=opnion due,4=delay'),
		'diagonisis' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 256, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ispaymentdone' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1, 'unsigned' => false),
		'createdate' => array('type' => 'datetime', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
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
			'doctor_id' => 1,
			'casecode' => 'Lorem ipsum dolor sit amet',
			'opinion_due_date' => '2015-12-06',
			'available_date' => '2015-12-06',
			'consultant_fee' => 1,
			'satatus' => 1,
			'diagonisis' => 'Lorem ipsum dolor sit amet',
			'ispaymentdone' => 1,
			'createdate' => '2015-12-06 04:44:40'
		),
	);

}
