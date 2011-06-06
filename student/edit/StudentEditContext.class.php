<?php 
require_once(SBINTERFACES);

/**
 *	StudentEditContext class
 *
 *	@param stname		string			Student name
 *	@param strollno	string			Student roll no
 *	@param stemail		string			Student email
 *	@param stcourse	integer			Student course 1=BTech 2=IDD 3=PhD
 *	@param styear		integer			Student year
 *	@param username	string			Username
 *	@param subject		string			Subject
 *	@param message	string			Message
 *	@param conn 		resource 		Database connection
 *	
 *	@return stuid		long int			Student ID generated
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class StudentEditContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$model['email'] = $model['stemail'];
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($context){
		$conn = $model['conn'];
		$stuid = $model['uid'];
		$stname = $conn->escape($model['newstname']);
		$strollno = $conn->escape($model['newstrollno']);
		$stemail = $conn->escape($model['newstemail']);
		$stcourse = $model['newstcourse'];
		$styear = $model['newstyear'];		
		
		$result = $conn->getResult("update students set stname = '$stname', strollno = '$strollno', stemail = '$stemail', stcourse = $stcourse, styear = $styear where stuid = $stuid;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/student.edit';
			return $model;
		}
		
		$model['valid'] = true;
		$model['stuid'] = $stuid;
		return $model;
	}
}

?>
