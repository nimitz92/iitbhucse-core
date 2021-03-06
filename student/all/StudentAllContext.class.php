<?php 
require_once(SBINTERFACES);

/**
 *	StudentAllContext class
 *
 *  @param styear				string			Student year
 *	@param stcourse			integer			Student course 1=B Tech 2=IDD 3=PhD
 *	@param allyear				boolean		Return all years if set
 *	@param conn 		  		resource 		Database connection
 *	
 *	@param students			array			Students information / All years
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class StudentAllContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
	
		$conn = $model['conn'];
		$allyear = isset($model['allyear']);
		$admin = isset($model['admin']);
		
		if($allyear){
			$result = $conn->getResult("select distinct styear from students order by styear desc;");
		} else if($admin){
		$stcourse = $model['stcourse'];
		$result = $conn->getResult("select * from students where stcourse=$stcourse order by stcourse, strollno;");
		} else{
			$styear = $model['styear'];
			$stcourse = $model['stcourse'];
			$result = $conn->getResult("select * from students where styear = $styear and stcourse=$stcourse order by stcourse, strollno;");
		}
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/student.all : '.$conn->getError();
			return $model;
		}
		
		$model['students'] = $result;
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
