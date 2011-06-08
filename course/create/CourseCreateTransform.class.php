<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	CourseCreateTransform class
 *
 *	@service enhancse-core.user.register
 *
**/
class CourseCreateTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		$op = $cl->load("user.register", ECROOT);
		$model = $kernel->run($op, $model);
		
		return $model;
	}
}

?>