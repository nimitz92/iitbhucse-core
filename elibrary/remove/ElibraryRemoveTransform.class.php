<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	ElibraryRemoveTransform class
 *
 *	@service enhancse-core.storage.delete
 *
**/
class ElibraryRemoveTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		$op = $cl->load("space.remove", ECROOT);
		$model = $kernel->run($op, $model);
		
		return $model;
	}
}

?>