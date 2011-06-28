<?php 
require_once(SBINTERFACES);

/**
 *	LibraryEditContext class
 *
 *	@param isbn					string			Book ISBN
 *	@param bookid					long integer			Book storage ID
 *	@param bookname					string			Book name
 *	@param bookauthor				string			Book Author
 *	@param bookpages					integer			Pages in Book
 *	@param bookdescription		string			Book Description
 *	@param conn 						resource 		Database connection
 *	
 *	@return valid 						boolean		Processed without errors
 *	@return msg							string			Error message if any
 *
**/
class LibraryEditContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$bookid = $model['bookid'];
		$isbn = $conn->escape($model['isbn']);
		$bookname = $conn->escape($model['bookname']);
		$bookauthor = $conn->escape($model['bookauthor']);
		$bookdescription = $conn->escape($model['bookdescription']);
		$bookcollection = $conn->escape($model['bookcollection']);
		$bookpages = isset($model['bookpages']) ? $model['bookpages'] : null;
		
		$result = $conn->getResult("update library set booid = $bookid, bookname = '$bookname', bookauthor = '$bookauthor', bookdescription = '$bookdescription', bookpages = $bookpages, bookcollection = '$bookcollection' where isbn = '$isbn';", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/library.edit';
			return $model;
		}
		$model['noofcopies'] = $result;
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
