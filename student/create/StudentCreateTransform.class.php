<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	StudentCreateTransform class
 *
 *	@service enhancse-core.user.register
 *	@service enhancse-core.storage.create
 *
**/
class StudentCreateTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		$op = $cl->load("user.register", ECROOT);
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
			
		$model['stgname'] = $model['stname'];
		$model['filename'] = '';
		$model['mime'] = 'application/pdf';
		$model['owner'] = $model['uid'];
		$model['access'] = 4;
		$model['groupid'] = 0;
		$model['dirid'] = '';
		$op = $cl->load("storage.create", ECROOT);
		$model = $kernel->run($op, $model);
		
		return $model;
	}
}

?>