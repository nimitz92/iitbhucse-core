<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	NewsAllTransform class
 *
**/
class NewsAllTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		
		return $model;
	}
}

?>