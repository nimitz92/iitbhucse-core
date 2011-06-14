<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	CourseAllTransform class
**/
class CourseAllTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		
		return $model;
	}
}

?>