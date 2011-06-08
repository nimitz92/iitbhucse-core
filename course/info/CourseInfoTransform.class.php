<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	CourseInfoTransform class
 *
**/
class CourseInfoTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		return $model;
	}
}

?>