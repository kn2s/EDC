<?php
App::uses('AppModel', 'Model');
/**
 * ScheduleDoctor Model
 *
 * @property WorkSchedule $WorkSchedule
 */
class ScheduleDoctor extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'WorkSchedule' => array(
			'className' => 'WorkSchedule',
			'foreignKey' => 'work_schedule_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		/*'Doct' => array(
			'className' => 'Patient',
			'foreignKey' => 'doct_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)*/
	);
}
