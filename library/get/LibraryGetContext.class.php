<?php 
require_once(SBINTERFACES);

/**
 *	LibraryGetContext class
 *
 *	@param isbn					string			Book ISBN
 *	@param conn 		resource 		Database connection
 *	
 *	@return book		array			Book Info
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class LibraryGetContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$isbn = $conn->escape($model['isbn']);
		
		$result = $conn->getResult("select * from library where isbn = '$isbn';");
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/library.get';
			return $model;
		}
		
		if(count($result) == 0){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Book';
			return $model;
		}
		
		$model['valid'] = true;
		$model['book'] = $result[0];
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		
		return $model;
	}
}

?>
