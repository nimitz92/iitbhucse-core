<?php 
require_once(SBINTERFACES);

/**
 *	CourseInfoContext class
 *	
 *	@param crsid			long int			Course ID
 *	@param conn 		resource 		Database connection
 *
 *  @return course    	array			Course Information
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class CourseInfoContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$crsid = $model['crsid'];
		
		$query = "select * from courses where crsid=$crsid";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/course.info';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Course ID';
			return $model;
		}
		
		$model['course'] = $result[0];
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
