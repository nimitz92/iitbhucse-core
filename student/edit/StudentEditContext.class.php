<?php 
require_once(SBINTERFACES);

/**
 *	StudentEditContext class
 *
 *	@param admin			boolean		Is admin 	
 *	@param username		string			Username
 *	@param password		string			Password
 *	@param stname			string			Student name
 *	@param strollno		string			Student roll no
 *	@param stcourse		integer			Student course 1=BTech 2=IDD 3=PhD
 *	@param styear			integer			Student year
 *	@param stphone		string			Student phone
 *  @param stinterest   	string          	Student Interest
 *  @param stcgpa      	string          	Student CGPA
 *  @param stplacement 	string          	Student Placement Status
 *  @param stinternship 	string          	Student Internship Status
 *  @param ststatus        integer			Student Status 1=ENROLLED 2=ALUMNUS
 *	@param conn 			resource 		Database connection
 *	
 *	@return valid 			boolean		Processed without errors
 *	@return msg				string			Error message if any
 *
**/
class StudentEditContext implements ContextService {

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
		$stuid = $model['stuid'];
		$admin = isset($model['admin']) ? $model['admin'] : false;
		
		$stphone = $conn->escape($model['stphone']);
		$stcgpa = $conn->escape($model['stcgpa']);
		$stinterest = $model['stinterest'];
		
		if($admin){
			$stname = $conn->escape($model['stname']);
			$strollno = $conn->escape($model['strollno']);
			$stcourse = $model['stcourse'];
			$styear = $model['styear'];	
			$ststatus = $model['ststatus'];
			$stinternship = $conn->escape($model['stinternship']);
			$stplacement = $conn->escape($model['stplacement']);
			
			$result = $conn->getResult("update students set stname = '$stname', strollno = '$strollno', stcourse = $stcourse, styear = $styear, stcgpa = '$stcgpa', stphone = '$stphone', stinternship = '$stinternship', stplacement = '$stplacement', ststatus = $ststatus, stinterest = '$stinterest' where stuid = $stuid;", true);
		}
		else{
			$result = $conn->getResult("update students set stcgpa = '$stcgpa', stphone = '$stphone', stinterest = '$stinterest' where stuid = $stuid;", true);
		}
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/student.edit : '.$conn->getError();
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
