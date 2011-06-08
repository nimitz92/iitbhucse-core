<?php 
require_once(SBINTERFACES);

/**
 *	FacultyInfoContext class
 *	
 *	@param fid		long int			Faculty ID
 *	@param conn 		resource 		Database connection
 *
 *  @return Faculty    array			Faculty Information
 *	@return user			array			User information
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class FacultyInfoContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$fid = $model['fid'];
		
		$query = "select * from faculty where fid=$fid";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/faculty.info';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Faculty ID';
			return $model;
		}
		
		$model['Faculty'] = $result[0];
		$model['valid'] = true;
		$model['uid'] = $stuid;
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($context){
		return $model;
	}
}

?>
