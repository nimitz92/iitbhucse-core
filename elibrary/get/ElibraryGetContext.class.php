<?php 
require_once(SBINTERFACES);

/**
 *	ElibraryGetContext class
 *
 *	@param bookid		string			Book storage ID
 *	@param conn 		resource 		Database connection
 *	
 *	@return book		array			Book Info
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class ElibraryGetContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$bookid = $model['bookid'];
		
		$result = $conn->getResult("select * from elibrary where bookid = $bookid;");
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/elibrary.get';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid Book ID';
			return $model;
		}
		
		$model['valid'] = true;
		$model['ebook'] = $result[0];
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
