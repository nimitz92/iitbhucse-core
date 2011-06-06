<?php 
require_once(SBINTERFACES);

class StudentCreateContext implements ContextService {

	// ContextService interface
	public function getContext($model){
		
		return $model;
	}
	
	// ContextService interface
	public function setContext($context){
		$conn = $model['conn'];
		$stuid = $model['uid'];
		$stname = $conn->escape($model['stname']);
		$strollno = $conn->escape($model['strollno']);
		$stemail = $conn->escape($model['stemail']);
		$stcourse = $model['stcourse'];
		$styear = $model['styear'];		
		$result = $conn->getResult("insert into student (stuid, stname, strollno, stemail, stcourse, styear) values ($stuid, '$stname', '$strollno', '$stemail', $stcourse, $styear);", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
