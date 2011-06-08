<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	CourseDeleteTransform class
 *
**/
class CourseDeleteTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		return $model;
	}
}

?>