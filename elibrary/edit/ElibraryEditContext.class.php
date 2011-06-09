<?php 
require_once(SBINTERFACES);

/**
 *	ElibraryEditContext class
 *
 *	@param bookid		string			Book storage ID
 *	@param bookname	string			Book name
 *	@param bookauthor		string		Book Author
 *	@param bookpages	integer			Pages in Book
 *	@param bookdescription		string			Book Description
 *	@param conn 		resource 		Database connection
 *	
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class ElibraryEditContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$bookid = $conn->escape($model['bookid']);
		$bookname = $conn->escape($model['bookname']);
		$bookauthor = $conn->escape($model['bookauthor']);
		$bookdesciption = $conn->escape($model['bookdescription']);
		$bookcollection = $conn->escape($model['bookcollection']);
		$bookpages = $model['bookpages'];
		
		$result = $conn->getResult("update elibrary set bookname = '$bookname', bookauthor = '$bookauthor', bookdescription = '$bookdescription', bookpages = $bookpages, bookcollection = '$bookcollection';", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database';
			return $model;
		}
		
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
