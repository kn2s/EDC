<?php
App::uses('AppModel', 'Model');
/**
 * DoctorCase Model
 *
 * @property Patient $Patient
 * @property Doctor $Doctor
 */
class DoctorCase extends AppModel {


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
			'conditions' => array('Patient.ispatient'=>'1','Patient.isdeleted'=>'0'),
			'fields' => array('Patient.id','Patient.name','Patient.email','Patient.doctallowtoeditquetionair'),
			'order' => ''
		),
		'Doctor' => array(
			'className' => 'Patient',
			'foreignKey' => 'doctor_id',
			'conditions' => array('Doctor.ispatient'=>'0','Doctor.isdeleted'=>'0'),
			'fields' => array('Doctor.id','Doctor.name','Doctor.email'),
			'order' => ''
		)
	);
}
