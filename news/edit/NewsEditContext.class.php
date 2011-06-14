<?php 
require_once(SBINTERFACES);

/**
 *	NewsEditContext class
 *
*	@param newstitle	      	string			News title
 *	@param newstime	      	string			News Time
 *	@param newscontent		  		string			News Content
 *	@param newsauthor	      		string			News Author
 *	@param newsexpiry	  	integer			News Expiry time
 *	@param conn 		  		resource 		Database connection
 *	
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class NewsEditContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($context){
		$conn = $model['conn'];
		$newsid = $model['newsid'];
		$newstitle = $conn->escape($model['newstitle']);
		$newstime = $model['newstime'];
		$newscontent = $conn->escape($model['newscontent']);
		$newsauthor = $conn->escape($model['newsauthor']);
		$newsexpiry = $model['newsexpiry'];
		
		$result = $conn->getResult("update news set newstitle = '$newstitle', newscontent = '$newscontent', newstime = $newstime, newsauthor = '$newsauthor', newsexpiry = $newsexpiry where newsid = $newsid;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/news.edit';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
