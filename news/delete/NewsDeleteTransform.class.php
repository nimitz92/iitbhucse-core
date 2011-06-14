<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	NewsDeleteTransform class
 *
**/
class NewsDeleteTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		
		return $model;
	}
}

?>