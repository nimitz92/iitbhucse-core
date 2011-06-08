<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	CourseEditTransform class
 *
 *	@service enhancse-core.user.authenticate
 *
**/
class CourseEditTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		$op = $cl->load("user.authenticate", ECROOT);
		$model = $kernel->run($op, $model);
		
		return $model;
	}
}

?>