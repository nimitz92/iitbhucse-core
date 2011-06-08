<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	FacultyDeleteTransform class
 *
 *	@service enhancse-core.user.delete
 *
**/
class FacultyDeleteTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		$op = $cl->load("user.delete", ECROOT);
		$model = $kernel->run($op, $model);
		
		return $model;
	}
}

?>