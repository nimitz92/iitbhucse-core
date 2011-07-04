<?php 
require_once(SBINTERFACES);

/**
 *	FacultyEditContext class
 *
*	@param username	      	string			Username
 *	@param password	      	string			Password
 *	@param fname		  		string			Faculty name
 *	@param fphone	      		string			Faculty phone no
 *	@param fdesignation	  	integer			Faculty designation 1=Professor 2=Assistant professor 3=Reader 4=Lecturer
 *  @param fqualification 	string            Faculty qualification 
 *  @param finterest      	string            Faculty interests
 *  @param fstatus			integer				Faculty Status 1=Teaching 2=Retired 
 *	@param conn 		  		resource 		Database connection
 *	
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class FacultyEditContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		$conn = $model['conn'];
		$fid = $model['fid'];
		$admin = isset($model['admin']) ? $model['admin'] : false;

		$fphone = $conn->escape($model['fphone']);
		$finterest = $conn->escape($model['finterest']);
		
		if($admin){
		$fname = $conn->escape($model['fname']);
		$fdesignation = $model['fdesignation'];
		$fstatus = $model['fstatus'];
		$fqualification = $conn->escape($model['fqualification']);
		
		$result = $conn->getResult("update faculty set fname = '$fname', fphone = '$fphone', fdesignation = $fdesignation, fqualification = '$fqualification', finterest = '$finterest', fstatus = $fstatus where fid = $fid;", true);
		}
		else{
			$result = $conn->getResult("update faculty set fphone = '$fphone', finterest = '$finterest' where fid = $fid;", true);
		}
		
		
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/faculty.edit';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
