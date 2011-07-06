<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	StudentDeleteTransform class
 *
 *	@service enhancse-core.user.delete
 *
**/
class StudentDeleteTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		$op = $cl->load("user.delete", ECROOT);
		$model['uid'] = $model['student']['stuid'];
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
		
		$op = $cl->load("content.delete", ECROOT);
		$model['cntid'] = $model['student']['sthome'];
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
			
		$op = $cl->load("space.remove", ECROOT);
		$model['spid'] = $model['student']['stphoto'];
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
			
		$op = $cl->load("space.remove", ECROOT);
		$model['spid'] = $model['student']['stresume'];
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
			
		return $model;	
	}
}

?>