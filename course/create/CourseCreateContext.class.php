<?php 
require_once(SBINTERFACES);

/**
 *	CourseCreateContext class
 *
 
 *  @param crsid        			long integer	Course ID
 *	@param crsname			string			Course name
 *	@param crsdescription		string			Course Description
 *  @param crspart				integer			Course Part
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
	public function setContext($model){
		$conn = $model['conn'];
		$crsid = $conn->escape($model['crsid']);
		$crsname = $conn->escape($model['crsname']);
		$crsdescription = $conn->escape($model['crsdescription']);
		$crspart = $model['crspart'];
		$crshome = $model['crshome'];
		
		$result = $conn->getResult("insert into courses (crsid, crsname, crsdescription, crspart, crshome) values ('$crsid', '$crsname', '$crsdescription', $crspart, $crshome);", true);
		
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
