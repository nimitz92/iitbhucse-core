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
