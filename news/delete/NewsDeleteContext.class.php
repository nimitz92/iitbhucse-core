<?php 
require_once(SBINTERFACES);

/**
 *	NewsDeleteContext class
 *
 *	@param newsid		int			News ID
 *	@param conn 		resource 		Database connection	
 
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class NewsDeleteContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
	$conn = $model['conn'];
		$newsid = $model['newsid'];
		
		$query = "select newsid from news where newsid=$newsid";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/news.delete';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid News ID';
			return $model;
		}
		
		$model['news'] = $result[0];
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($context){
		$conn = $model['conn'];
		$newsid = $model['newsid'];	
		
		$result = $conn->getResult("delete from news where newsid=$newsid);", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/news.delete';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>