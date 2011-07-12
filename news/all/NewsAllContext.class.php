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
		$admin = isset($model['admin']) ? $model['admin'] : false;
		$top = isset($model['count']) ? $model['count'] : 5;
		$all = isset($model['all']) ? $model['all'] : false;
		
		if($admin || $all){
			$result = $conn->getResult("select *, (select size from storages where stgid = (select stgid from spaces where spid=newsattachment)) as newssize from news order by newstime desc;");
		}
		else{
			$result = $conn->getResult("select * from news order by newstime desc limit $top;");
		}
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
