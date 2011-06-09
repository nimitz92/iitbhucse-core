<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	ElibraryEditTransform class
 *
 *
 *
**/
class ElibraryEditTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		return $model;
	}
}

?>