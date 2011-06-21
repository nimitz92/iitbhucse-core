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
		
		$op = $cl->load("storage.create", ECROOT);
		$model['stgname'] = 'Resume-'.$model['stname'];
		$model['filepath'] = $model['strspath'];
		$model['filename'] = $model['stname'].'.pdf';
		$model['mime'] = 'application/pdf';
		$model['size'] = 0;
		$model['owner'] = $model['uid'];
		$model['access'] = 2;
		$model['protection'] = '';
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
		
		$op = $cl->load("space.add", ECROOT);
		$model['spvfpath'] = '/resume/';
		$model['spvfname'] = $model['filename'];
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
		
		$model['stresume'] = $model['spid'];
		
		$op = $cl->load("storage.create", ECROOT);
		$model['stgname'] = 'Photo-'.$model['stname'];
		$model['filepath'] = $model['stphpath'];
		$model['filename'] = $model['stname'].'.png';
		$model['mime'] = 'image/png';
		$model['size'] = 0;
		$model['owner'] = $model['uid'];
		$model['access'] = 2;
		$model['protection'] = '';
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
		
		$op = $cl->load("space.add", ECROOT);
		$model['spvfpath'] = '/photo/';
		$model['spvfname'] = $model['filename'];
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
		
		$model['stphoto'] = $model['spid'];
		return $model;
	}
}

?>