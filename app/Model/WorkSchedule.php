<?php
App::uses('AppModel', 'Model');
/**
 * WorkSchedule Model
 *
 * @property ScheduleDoctor $ScheduleDoctor
 */
class WorkSchedule extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ScheduleDoctor' => array(
			'className' => 'ScheduleDoctor',
			'foreignKey' => 'work_schedule_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
