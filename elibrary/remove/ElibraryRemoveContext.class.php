<?php 
require_once(SBINTERFACES);

/**
 *	ElibraryRemoveContext class
 *
 *	@param bookid		string			Book storage ID
 *	@param conn 		resource 		Database connection
 *	
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class ElibraryRemoveContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$model['stgid'] = $conn->escape($model['bookid']);
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($context){
		$conn = $model['conn'];
		$bookid = $conn->escape($model['bookid']);
		
		$result = $conn->getResult("delete from elibrary where bookid = '$bookid';", true);
		
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
