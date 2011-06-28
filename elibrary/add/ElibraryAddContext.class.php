<?php 
require_once(SBINTERFACES);

/**
 *	ElibraryAddContext class
 *
 *	@param bookid					string			Book storage ID
 *	@param bookname				string			Book name
 *	@param bookauthor			string		Book Author
 *	@param bookpages				integer			Pages in Book
 *	@param bookdescription	string			Book Description
 *	@param conn 					resource 		Database connection
 *	
 *	@return valid 					boolean		Processed without errors
 *	@return msg						string			Error message if any
 *
**/
class ElibraryAddContext implements ContextService {

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
		$bookid = $model['spid'];
		$bookname = $conn->escape($model['bookname']);
		$bookauthor = $conn->escape($model['bookauthor']);
		$bookdescription = $conn->escape($model['bookdescription']);
		$bookcollection = $conn->escape($model['bookcollection']);
		$bookpages = $model['bookpages'];
		
		$result = $conn->getResult("insert into elibrary (bookid, bookname, bookauthor, bookdescription, bookpages, bookcollection) values ($bookid, '$bookname', '$bookauthor', '$bookdescription', $bookpages, '$bookcollection');", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setcontext/elibrary.add';
			return $model;
		}
		
		$model['valid'] = true;
		$model['bookid'] = $bookid;
		return $model;
	}
}

?>
