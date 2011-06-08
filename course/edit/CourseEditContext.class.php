<?php 
require_once(SBINTERFACES);

/**
 *	CourseEditContext class
 *
 *  @param crsid                    long integer     Course ID
 *	@param crsname		            string			Course name
 *	@param crsdescription	        string			Course Description
 *	@param conn 		            resource 		Database connection
 *	
 *	@return valid 		            boolean		Processed without errors
 *	@return msg			            string			Error message if any
 *
**/
class CourseEditContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($context){
		$conn = $model['conn'];
		$crsid = $model['crsid'];
		$crsname = $conn->escape($model['crsname']);
		$crsdescription = $conn->escape($model['crsdescription']);		
		
		$result = $conn->getResult("update courses set crsname = '$crsname', crsdescription = '$crsdescription' where crsid = $crsid;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/course.edit';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
