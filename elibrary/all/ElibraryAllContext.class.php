<?php 
require_once(SBINTERFACES);

/**
 *	ElibraryAllContext class
 *
 *  @param bookcollection	string			Book Collection 
 *	@param conn 		  		resource 		Database connection
 *	
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class ElibraryAllContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
	
		$conn = $model['conn'];
		$bookcollection = $conn->escape($model['bookcollection']);
		
		$result = $conn->getResult("select * from elibrary where bookcollection = '$bookcollection';", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/elibrary.all';
			return $model;
		}
		$model['status'] = $result;
		$model['valid'] = true;
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
