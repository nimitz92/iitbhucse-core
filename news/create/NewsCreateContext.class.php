 <?php 
require_once(SBINTERFACES);
require_once(SBROOT. 'lib/util/Time.class.php');

/**
 *	NewsCreateContext class
 *
 *	@param newstitle					string			News Title
 *	@param newstime	    			integer			News Time
 *	@param newscontent					string			News Content
 *	@param newsauthor				string			News author
 *	@param newsexpiry	   			integer			News Expiry
 *	@param conn 					resource 		Database connection
 *	
 *	@return valid 					boolean		Processed without errors
 *	@return msg						string			Error message if any
 *
**/
class NewsCreateContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$newstitle = $conn->escape($model['newstitle']);
		$newstime = Time::getTime();
		$newscontent = $conn->escape($model['newscontent']);
		$newsauthor = $conn->escape($model['newsauthor']);
		$newsdescription = $conn->escape($model['newsdescription']);
		$newsexpiry = $newstime + ($model['newsexpiry'] * 24 * 60 * 60);
		
		$result = $conn->getResult("insert into news (newstitle, newstime, newscontent, newsauthor, newsexpiry, newsdescription) values ('$newstitle', $newstime, '$newscontent', '$newsauthor', $newsexpiry, '$newsdescription');", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getcontext/news.create';
			return $model;
		}
		
		$model['newsid'] = $conn->getAutoId();
		$model['valid'] = true;
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		$conn = $model['conn'];
		$newsattachment = $model['spid'];
		$newsid = $model['newsid'];
		
		$result = $conn->getResult("update news set newsattachment = $newsattachment where newsid = $newsid;", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setcontext/news.create';
			return $model;
		}
		
		$model['valid'] = true;
		return $model;
	}
}

?>
