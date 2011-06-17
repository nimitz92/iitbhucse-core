<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	FacultyEditTransform class
 *
 *	@service enhancse-core.user.authenticate
 *
**/
class FacultyEditTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		return $model;
	}
}

?>