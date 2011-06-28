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
		$admin = isset($model['admin']);
		$allbooks = isset($model['allbooks']);
		$getcollections = isset($model['getcollections']);
		
		
		if($allbooks || $admin){
			$result = $conn->getResult("select *, (select size from storages where stgid = (select stgid from spaces where spid=bookid)) as booksize from elibrary order by bookname;");
		}
		else if($getcollections){
			$result = $conn->getResult("select distinct bookcollection from elibrary order by bookcollection;");
		}
		else{
			$bookcollection = $conn->escape($model['bookcollection']);
			$result = $conn->getResult("select *, (select size from storages where stgid = (select stgid from spaces where spid=bookid)) as booksize from elibrary where bookcollection = '$bookcollection';");
		}
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/elibrary.all';
			return $model;
		}
		$model['ebooks'] = $result;
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
