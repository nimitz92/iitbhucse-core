<?php 
require_once(SBINTERFACES);

/**
 *	LibraryRemoveContext class
 *
 *	@param isbn					string			Book ISBN
 *	@param conn 		resource 		Database connection
 *	
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class LibraryRemoveContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$isbn = $conn->escape($model['isbn']);
		
		$result = $conn->getResult("select bookid from library where isbn = '$isbn';", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/library.remove';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid ISBN';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		$conn = $model['conn'];
		$isbn = $conn->escape($model['isbn']);
		
		$result = $conn->getResult("delete from library where isbn = '$isbn';", true);
		
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
