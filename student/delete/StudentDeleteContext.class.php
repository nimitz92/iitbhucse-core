<?php 
require_once(SBINTERFACES);

/**
 *	StudentDeleteContext class
 *
 *	@param stuid		long int			Student ID
 *	@param conn 		resource 		Database connection	
 
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class StudentDeleteContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$stuid = $model['stuid'];
		
		$query = "select stuid, stphoto, stresume, sthome from students where stuid=$stuid";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/student.delete';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Student ID';
			return $model;
		}
		
		$model['student'] = $result[0];
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		$conn = $model['conn'];
		$stuid = $model['stuid'];	
		
		$result = $conn->getResult("delete from students where stuid=$stuid;", true);
		
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
