<?php 
require_once(SBINTERFACES);

/**
 *	FacultyAllContext class
 *
 *  @param fstatus				integer			Faculty Status 1=Teaching 2=Retired 
 *	@param conn 		  		resource 		Database connection
 *	
 *	@return valid 				boolean			Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class FacultyAllContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
	
		$conn = $model['conn'];
		$fstatus = $model['fstatus'];
		
		$result = $conn->getResult("select * from faculty where fstatus = $fstatus;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/faculty.all';
			return $model;
		}
		$model['status'] = $result;
		$model['valid'] = true;
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($context){
		
		return $model;
	}
}

?>
