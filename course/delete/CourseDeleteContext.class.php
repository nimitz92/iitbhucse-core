<?php 
require_once(SBINTERFACES);

/**
 *	CourseDeleteContext class
 *
 *	@param crsid			long int			Course ID
 *	@param conn 		resource 		Database connection	
 
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class CourseDeleteContext implements ContextService {

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
		$crsid = $conn->escape($model['crsid']);	
		
		$result = $conn->getResult("delete from courses where crsid = '$crsid';", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/course.delete';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
