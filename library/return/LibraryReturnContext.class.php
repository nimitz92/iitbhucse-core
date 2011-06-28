<?php 
require_once(SBINTERFACES);

/**
 *	LibraryReturnContext class
 *
 *	@param isbn					string			Book ISBN
 *  @param issuedto					long integer		User ID of Issuee
 *  @param status					integer				Status of Book 1=Available 2=Not Available
 *	@param conn 						resource 		Database connection
 *	
 *	@return valid 						boolean		Processed without errors
 *	@return msg							string			Error message if any
 *
**/
class LibraryReturnContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		$conn = $model['conn'];
		$isbn = $conn->escape($model['isbn']);
		$result = $conn->getResult("update library set issuedto = null, status = 1 where isbn = '$isbn';", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/library.return';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
