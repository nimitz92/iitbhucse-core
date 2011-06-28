<?php 
require_once(SBINTERFACES);

/**
 *	LibraryAllContext class
 *
 *  @param bookcollection	string			Book Collection 
 *	@param conn 		  		resource 		Database connection
 *	
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class LibraryAllContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
	
		$conn = $model['conn'];
		$admin = isset($model['admin']);
		$allbooks = isset($model['allbooks']);
		$getcollections = isset($model['getcollections']);
		
		if($allbooks || $admin){
			$result = $conn->getResult("select * from library order by bookname;");
		}
		else if($getcollections){
			$result = $conn->getResult("select distinct bookcollection from library order by bookcollection;");
		}
		else{
			$bookcollection = $conn->escape($model['bookcollection']);
			$result = $conn->getResult("select * from library where bookcollection = '$bookcollection' order by bookname;");
		}
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/library.all';
			return $model;
		}
		$model['books'] = $result;
		$model['valid'] = true;
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
