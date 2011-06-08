<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	CourseInfoTransform class
 *
 *	@service enhancse-core.user.info
 *
**/
class CourseInfoTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		$op = $cl->load("user.info", ECROOT);
		$model = $kernel->run($op, $model);
		
		return $model;
	}
}

?>