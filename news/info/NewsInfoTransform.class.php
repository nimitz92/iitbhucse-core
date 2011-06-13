<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	NewsInfoTransform class
 *
**/
class NewsInfoTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		
		return $model;
	}
}

?>