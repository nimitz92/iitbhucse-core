<?php 
require_once(SBINTERFACES);

/**
 *	CourseAllContext class
 * 
 *	@param conn 		  		resource 		Database connection
 *	
 *  @return course				array		Array containing courses info
 *  @return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class CourseAllContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
	
		$conn = $model['conn'];
		
		$result = $conn->getResult("select * from courses order by crspart");
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/course.all';
			return $model;
		}
		$model['courses'] = $result;
		$model['valid'] = true;
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
