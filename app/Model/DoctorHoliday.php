<?php
App::uses('AppModel', 'Model');
/**
 * DoctorHoliday Model
 *
 */
class DoctorHoliday extends AppModel {
/**
 * belongsTo associations 
 */
 public $belongsTo = array(
	'Doct'=>array(
		'className'=>'Patient',
		'foreignKey' => 'doct_id',
		'conditions' => array('Doct.ispatient'=>'0','Doct.isactive'=>'1','Doct.isdeleted'=>'0'),
		'fields' => array('Doct.id','Doct.name','Doct.email'),
		'order' => ''
	)
 );
}
