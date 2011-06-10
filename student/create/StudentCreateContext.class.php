<?php 
require_once(SBINTERFACES);

/**
 *	StudentCreateContext class
 *
 *	@param stname		string			Student name
 *	@param strollno	string			Student roll no
 *	@param stemail		string			Student email
 *	@param stcourse	integer			Student course 1=BTech 2=IDD 3=PhD
 *	@param styear		integer			Student year
 *  @param ststatus     integer		Student Status 1=ENROLLED 2=ALUMNUS
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
class StudentCreateContext implements ContextService {

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
	public function setContext($model){
		$conn = $model['conn'];
		$stuid = $model['uid'];
		$stname = $conn->escape($model['stname']);
		$strollno = $conn->escape($model['strollno']);
		$stemail = $conn->escape($model['stemail']);
		$stcourse = $model['stcourse'];
		$styear = $model['styear'];		
		$ststatus = $model['ststatus'];
		
		$result = $conn->getResult("insert into students (stuid, stname, strollno, stemail, stcourse, styear,  ststatus) values ($stuid, '$stname', '$strollno', '$stemail', $stcourse, $styear, $ststatus);", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		$model['valid'] = true;
		$model['stuid'] = $stuid;
		return $model;
	}
}

?>
