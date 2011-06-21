<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	StudentEditTransform class
 *
 *
**/
class StudentEditTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		/*$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		if(!$model['admin']){
			$op = $cl->load("user.authenticate", ECROOT);
			$model = $kernel->run($op, $model);
			
			if(!$model['valid'])
				return $model;
		}
		*/
		return $model;
	}
}

?>