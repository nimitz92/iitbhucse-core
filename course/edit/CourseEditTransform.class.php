<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	CourseEditTransform class
 *
**/
class CourseEditTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){		
		return $model;
	}
}

?>