<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	LibraryIssueTransform class
 *
**/
class LibraryIssueTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		$op = $cl->load("user.info", ECROOT);
		$model['uid'] = $model['issuedto'];
		$model = $kernel->run($op, $model);
		
		return $model;
	}
}

?>