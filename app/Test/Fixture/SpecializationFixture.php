<?php
/**
 * Specialization Fixture
 */
class SpecializationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 254, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'isactive' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false),
		'isdeleted' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false),
		'createdon' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 254, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB', 'comment' => 'doctors specialization list')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'isactive' => 1,
			'isdeleted' => 1,
			'createdon' => 'Lorem ipsum dolor sit amet'
		),
	);

}
