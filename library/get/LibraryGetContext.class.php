<?php 
require_once(SBINTERFACES);

/**
 *	LibraryGetContext class
 *
 *	@param bookid		string			Book storage ID
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
		$bookname = $model['bookname'];
		
		$result = $conn->getResult("select * from library where bookname = '$bookname';");
		
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
		$conn = $model['conn'];
		$bookname = $model['book']['bookname'];
		
		$result1 = $conn->getResult("select count(*) from library where bookname = '$bookname';");
		$result2 = $conn->getResult("select count(*) from library where bookname = '$bookname' and status = 1;");
		
		if($result1 === false || $result2 === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/library.get';
			return $model;
		}
		
		$model['total'] = $result1[0][0];
		$model['avail'] = $result2[0][0];
		return $model;
	}
}

?>
