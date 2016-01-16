<?php
App::uses('AppModel', 'Model');
/**
 * DoctorSpecializetion Model
 *
 * @property Specialization $Specialization
 */
class DoctorSpecializetion extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Specialization' => array(
			'className' => 'Specialization',
			'foreignKey' => 'specialization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Doctor' => array(
			'className' => 'Doctor',
			'foreignKey' => 'doct_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
