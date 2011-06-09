<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	ElibraryGetTransform class
 *
 *	@service enhancse-core.storage.list
 *
**/
class ElibraryGetTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		$op = $cl->load("storage.list", ECROOT);
		$model = $kernel->run($op, $model);
		
		return $model;
	}
}

?>