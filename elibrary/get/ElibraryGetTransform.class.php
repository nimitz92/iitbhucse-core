<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	ElibraryGetTransform class
 *
 *
 *
**/
class ElibraryGetTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		return $model;
	}
}

?>