 <?php 
require_once(SBINTERFACES);

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
		$newstime = $model['newstime'];
		$newscontent = $conn->escape($model['newscontent']);
		$newsauthor = $conn->escape($model['newsauthor']);		
		$newsexpiry = $model['newsexpiry'];
		
		$result = $conn->getResult("insert into news (newstitle, newstime, newscontent, newsauthor, newsexpiry) values ('$newstitle', $newstime, '$newscontent', '$newsauthor', $newsexpiry);", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setcontext/news.create';
			return $model;
		}
		
		$model['valid'] = true;
		$model['fid'] = $fid;
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
