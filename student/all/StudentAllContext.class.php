<?php 
require_once(SBINTERFACES);

/**
 *	StudentAllContext class
 *
 *  @param styear				string			Student year
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
		
		if($allyear){
			$result = $conn->getResult("select distinct styear from students order by styear desc;");
		} else {
			$styear = $conn->escape($model['styear']);
			$result = $conn->getResult("select * from students where styear = '$styear' order by stcourse, strollno;");
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
