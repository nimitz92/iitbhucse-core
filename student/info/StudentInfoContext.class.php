<?php 
require_once(SBINTERFACES);

/**
 *	StudentInfoContext class
 *	
 *	@param stuid		long int			Student ID
 *	@param conn 		resource 		Database connection
 *
 *  @return student    array			Student Information
 *	@return user			array			User information
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class StudentInfoContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$stuid = $model['stuid'];
		
		$query = "select * from students where stuid=$stuid";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/student.info';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Student ID';
			return $model;
		}
		
		$model['student'] = $result[0];
		$model['valid'] = true;
		$model['uid'] = $stuid;
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		return $model;
	}
}

?>
