<?php 
require_once(SBINTERFACES);

/**
 *	NewsAllContext class
 *
 *	@param conn 		  		resource 		Database connection
 *	
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class NewsAllContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
	
		$conn = $model['conn'];
		
		$result = $conn->getResult("select * from news order by newstime desc;");
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setContext/news.all';
			return $model;
		}
		$model['news'] = $result;
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
