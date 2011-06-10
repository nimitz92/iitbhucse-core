<?php 
require_once(SBINTERFACES);

/**
 *	StudentAllContext class
 *
 *  @param ststatus			integer			Student Status 1=ENROLLED 2=ALUMNUS 
 *	@param conn 		  		resource 		Database connection
 *	
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class StudentAllContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
	
		$conn = $model['conn'];
		$ststatus = $model['ststatus'];
		
		$result = $conn->getResult("select * from students where ststatus = $ststatus;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/student.all';
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
