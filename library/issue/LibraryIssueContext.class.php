<?php 
require_once(SBINTERFACES);

/**
 *	LibraryIssueContext class
 *
 *	@param bookid					long integer			Book storage ID
 *  @param issuedto					long integer		User ID of Issuee
 *  @param status					integer				Status of Book 1=Available 2=Not Available
 *	@param conn 						resource 		Database connection
 *	
 *	@return valid 						boolean		Processed without errors
 *	@return msg							string			Error message if any
 *
**/
class LibraryIssueContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$bookname = $model['bookname'];
		
		$result = $conn->getResult("select bookid from library where bookname = '$bookname' and status = 1;");
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/library.issue';
			return $model;
		}
		
		$model['bookid'] = $result[0][0];
		$model['valid'] = true;
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		$conn = $model['conn'];
		$bookid = $model['bookid'];
		$issuedto = $model['issuedto'];
		
		$result = $conn->getResult("update library set issuedto = $issuedto, status = 2 where bookid = $bookid;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/library.issue';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
