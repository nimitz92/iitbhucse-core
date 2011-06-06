<?php 
require_once(SBINTERFACES);

/**
 *	StudentInfoContext class
 *
 *	
 *	@param conn 		resource 		Database connection	
 *	@param stuid		long int			Student ID generated
 *
 *  @return student     array         Student Information
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class StudentInfoContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$model['email'] = $model['stemail'];
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($context){
		$conn = $model['conn'];
		$stuid = $model['uid'];
		
		$result = $conn->getResult("select stname, strollno, stemail, stcourse, styear, stinterest from students where stuid = $stuid;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		$model['valid'] = true;
		$model['student'] = result[0];
		$model['stuid'] = $stuid;
		return $model;
	}
}

?>
