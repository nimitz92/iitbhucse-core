<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	CourseCreateTransform class
 *
**/
class CourseCreateTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){		
		return $model;
	}
}

?>