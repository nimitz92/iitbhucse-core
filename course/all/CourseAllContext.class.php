<?php 
require_once(SBINTERFACES);

/**
 *	CourseAllContext class
 * 
 *	@param conn 		  		resource 		Database connection
 *	@param getparts				boolean			Returns all parts if set
 *  @param allparts				boolean			Returns all Courses if set
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
		
		$allparts = isset($model['allparts']);
		$getparts = isset($model['getparts']);
		$admin = isset($model['admin']);
		
		if($getparts){
			$result = $conn->getResult("select distinct crspart from courses order by crspart ");
		}  
		else if($allparts || $admin){
			$result = $conn->getResult("select * from courses order by crspart ");
		}
		else{
			$crspart = $model['crspart'];
			$result = $conn->getResult("select * from courses where crspart = $crspart order by crsid");
		}
		
		
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
