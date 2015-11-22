<?php
App::uses('AppModel', 'Model');
/**
 * TumarMarker Model
 *
 * @property AboutIllness $AboutIllness
 */
class TumarMarker extends AppModel {

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
		'AboutIllness' => array(
			'className' => 'AboutIllness',
			'foreignKey' => 'about_illness_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
