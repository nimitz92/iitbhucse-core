<?php 
require_once(SBINTERFACES);

/**
 *	LibraryAddContext class
 *
 *	@param isbn						string			Book ISBN
 *	@param bookname					string			Book name
 *	@param bookauthor				string			Book Author
 *	@param bookpages				integer			Pages in Book
 *	@param bookdescription			string			Book Description
 *  @param bookcollection			string			Book Collection
 *  @param status					integer			Book Status 1=Available 2=Not Available
 *	@param conn 					resource 		Database connection
 *	
 *	@return bookid					long integer			Auto Generated Book ID
 *	@return valid 					boolean		Processed without errors
 *	@return msg						string			Error message if any
 *
**/
class LibraryAddContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$isbn = $conn->escape($model['isbn']);
		$bookid = $model['bookid'];
		$bookname = $conn->escape($model['bookname']);
		$bookauthor = $conn->escape($model['bookauthor']);
		$bookdescription = $conn->escape($model['bookdescription']);
		$bookcollection = $conn->escape($model['bookcollection']);
		$bookpages = isset($model['bookpages']) ? $model['bookpages'] : null;
		$status = 1;
		
		$result = $conn->getResult("insert into library (isbn, bookid, bookname, bookauthor, bookdescription, bookpages, bookcollection, status) values ('$isbn', $bookid, '$bookname', '$bookauthor', '$bookdescription', $bookpages, '$bookcollection', $status);", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @ getContext/library.add';
			return $model;
		}
		
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
