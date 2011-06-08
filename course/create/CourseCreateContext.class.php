<?php 
require_once(SBINTERFACES);

/**
 *	CourseCreateContext class
 *
 
 *  @param crsid        			long integer	Course ID
 *	@param crsname			string			Course name
 *	@param crsdescription		string			Course Description
 *	@param conn 				resource 		Database connection
 *
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class CourseCreateContext implements ContextService {

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
		$result = $conn->getResult("insert into courses (crsid, crsname, crsdescription) values ($crsid, '$crsname', '$crsdescription');", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/course.create';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
