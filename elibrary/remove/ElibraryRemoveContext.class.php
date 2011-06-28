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
		$bookid = $model['bookid'];
		
		$result = $conn->getResult("select bookid from elibrary where bookid = $bookid;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/elibrary.remove';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Book ID';
			return $model;
		}
		
		$model['valid'] = true;
		$model['stgid'] = $result[0];
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		$conn = $model['conn'];
		$bookid = $model['bookid'];
		
		$result = $conn->getResult("delete from elibrary where bookid = $bookid;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/elibrary.remove';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
