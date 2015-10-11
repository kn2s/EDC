<?php
App::uses('AppModel', 'Model');
/**
 * DrugAlergy Model
 *
 * @property PatientDetail $PatientDetail
 */
class DrugAlergy extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'PatientDetail' => array(
			'className' => 'PatientDetail',
			'foreignKey' => 'patient_detail_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
