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
		$model['uid'] = $model['faculty']['fid'];
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
		
		$op = $cl->load("content.delete", ECROOT);
		$model['cntid'] = $model['faculty']['fhome'];
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
			
		$op = $cl->load("space.remove", ECROOT);
		$model['spid'] = $model['faculty']['fphoto'];
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
			
		$op = $cl->load("space.remove", ECROOT);
		$model['spid'] = $model['faculty']['fresume'];
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
		
		return $model;
	}
}

?>