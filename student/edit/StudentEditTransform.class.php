<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	StudentEditTransform class
 *
 *	@service enhancse-core.user.authenticate
 *
**/
class StudentEditTransform implements TransformService {

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