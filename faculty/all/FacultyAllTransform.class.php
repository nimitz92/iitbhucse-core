<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	FacultyAllTransform class
 *
**/
class FacultyAllTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		
		return $model;
	}
}

?>