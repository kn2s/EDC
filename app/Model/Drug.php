<?php
App::uses('AppModel', 'Model');
/**
 * Drug Model
 *
 * @property Socialactivity $Socialactivity
 */
class Drug extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Socialactivity' => array(
			'className' => 'Socialactivity',
			'foreignKey' => 'socialactivity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
