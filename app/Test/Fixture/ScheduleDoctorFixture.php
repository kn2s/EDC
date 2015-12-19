<?php
/**
 * ScheduleDoctor Fixture
 */
class ScheduleDoctorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'work_schedule_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true),
		'doct_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'patient_id those are doctore'),
		'isonholiday' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1, 'unsigned' => false),
		'assignment' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'unsigned' => false, 'comment' => 'how many assingmet allocated'),
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
			'work_schedule_id' => 1,
			'doct_id' => 1,
			'isonholiday' => 1,
			'assignment' => 1
		),
	);

}
