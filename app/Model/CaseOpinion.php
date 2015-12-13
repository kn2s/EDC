<?php
App::uses('AppModel', 'Model');
/**
 * CaseOpinion Model
 *
 * @property DoctorCase $DoctorCase
 */
class CaseOpinion extends AppModel {


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
		)
	);
}
