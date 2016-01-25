<?php
App::uses('AppModel', 'Model');
/**
 * Doctor Model
 *
 * @property Patient $Patient
 * @property Specialization $Specialization
 */
class Doctor extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Patient' => array(
			'className' => 'Patient',
			'foreignKey' => 'patient_id',
			'conditions' => '',
			'fields' => array('Patient.id','Patient.name','Patient.email','Patient.isactive','Patient.isdeleted','Patient.dpdfldshow'),
			'order' => ''
		),
		'Specialization' => array(
			'className' => 'Specialization',
			'foreignKey' => 'specialization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
