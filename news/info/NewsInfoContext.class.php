<?php 
require_once(SBINTERFACES);

/**
 *	NewsInfoContext class
 *	
 *	@param fid			long int			News ID
 *	@param conn 		resource 		Database connection
 *
 *  @return news    	array			News information
 *	@return valid 		boolean		Processed without errors
 *	@return msg			string			Error message if any
 *
**/
class NewsInfoContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$newsid = $model['newsid'];
		
		$query = "select *, (select size from storages where stgid = (select stgid from spaces where spid=newsattachment)) as newssize from news where newsid=$newsid;";
		$result = $conn->getResult($query);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/news.info';
			return $model;
		}
		
		if(count($result) != 1){
			$model['valid'] = false;
			$model['msg'] = 'Invalid News ID';
			return $model;
		}
		
		$model['news'] = $result[0];
		$model['valid'] = true;
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		$et = $model['news']['newsexpiry'];
		$ct = $model['news']['newstime'];
		$timeDifference = ($et - $ct);
		$model['news']['newsexpiry'] = $timeDifference/(60*60*24);
		return $model;
	}
}

?>
