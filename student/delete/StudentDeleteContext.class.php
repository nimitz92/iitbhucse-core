<?php 
require_once(SBINTERFACES);

/**
 *	StudentDeleteContext class
 *
 *	@param conn 		resource 		Database connection	
 *	@param stuid		long int			Student ID generated
 
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class StudentDeleteContext implements ContextService {

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
		
		$result = $conn->getResult("delete from students where stuid=$stuid);", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/student.delete';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
