<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	ElibraryAddTransform class
 *
 *	@service enhancse-core.storage.create
 *
**/
class ElibraryAddTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		$op = $cl->load("storage.create", ECROOT);
		$model = $kernel->run($op, $model);
		
		return $model;
	}
}

?>