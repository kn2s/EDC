<?php
App::uses('AppModel', 'Model');
/**
 * AboutIllness Model
 *
 * @property Patient $Patient
 * @property PrincipleDiagonisises $PrincipleDiagonisises
 */
class AboutIllness extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'about_illness';


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
			'fields' => '',
			'order' => ''
		),
		'Specialization' => array(
			'className' => 'Specialization',
			'foreignKey' => 'principle_diagonisises_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		/*'PrincipleDiagonisises' => array(
			'className' => 'PrincipleDiagonisises',
			'foreignKey' => 'principle_diagonisises_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)*/
	);
	
/**
 * hasMany associations
 *
 * @var array
 */
	 public $hasMany = array(
		'TumarMarker'=>array(
			'className' => 'TumarMarker',
			'foreignKey' => 'about_illness_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	 );
}
