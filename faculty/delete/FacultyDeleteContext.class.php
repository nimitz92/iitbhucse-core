<?php 
require_once(SBINTERFACES);

/**
 *	FacultyDeleteContext class
 *
 *	@param fid			long int			Faculty ID
 *	@param conn 		resource 		Database connection	
 
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class FacultyDeleteContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
	$conn = $model['conn'];
		$fid = $model['fid'];
		
		$query = "select fid from faculty where fid=$fid";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/faculty.delete';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Faculty ID';
			return $model;
		}
		
		$model['faculty'] = $result[0];
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($context){
		$conn = $model['conn'];
		$fid = $model['uid'];	
		
		$result = $conn->getResult("delete from faculty where fid=$fid);", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/faculty.delete';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
