<?php 
require_once(SBINTERFACES);

/**
 *	StudentEditContext class
 *
*	@param username		string			Username
 *	@param password		string			Password
 *	@param stname			string			Student name
 *	@param strollno		string			Student roll no
 *	@param stcourse		integer			Student course 1=BTech 2=IDD 3=PhD
 *	@param styear			integer			Student year
 *  @param stinterest   	string          	Student Interest
 *  @param stcgpa      	string          	Student CGPA
 *  @param stplacement 	string          	Student Placement Status
 *  @param stinternship 	string          	Student Internship Status
 *  //@param stresume     	string          	Student Resume storage id
 *  @param ststatus        integer		Student Status 1=ENROLLED 2=ALUMNUS
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
	public function setContext($context){
		$conn = $model['conn'];
		$stuid = $model['uid'];
		$stname = $conn->escape($model['stname']);
		$strollno = $conn->escape($model['strollno']);
		$stcourse = $model['stcourse'];
		$styear = $model['styear'];		
		$stcgpa = $conn->escape($model['stcgpa']);
		$stinternship = $conn->escape($model['stinternship']);
		$stplacement = $conn->escape($model['stplacement']);
		//$stresume = $conn->escape($model['stresume']);
		$ststatus = $model['ststatus'];
		
		$result = $conn->getResult("update students set stname = '$stname', strollno = '$strollno', stcourse = $stcourse, styear = $styear, stcgpa = '$stcgpa', stinternship = '$stinternship', stplacement = '$stplacement', ststatus = $ststatus where stuid = $stuid;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/student.edit';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
