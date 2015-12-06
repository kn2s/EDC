<?php
App::uses('AppModel', 'Model');
/**
 * CaseCommunication Model
 *
 * @property DoctorCase $DoctorCase
 * @property Patient $Patient
 */
class CaseCommunication extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'DoctorCase' => array(
			'className' => 'DoctorCase',
			'foreignKey' => 'doctor_case_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Patient' => array(
			'className' => 'Patient',
			'foreignKey' => 'patient_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
