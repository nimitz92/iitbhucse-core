<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	NewsCreateTransform class
 *
**/
class NewsCreateTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){
		$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		$op = $cl->load("storage.create", ECROOT);
		$model['stgname'] = 'News-'.$model['newstitle'];
		$model['filepath'] = $model['newspath'];
		$model['filename'] = 'News-'.$model['newsid'].'.pdf';
		$model['mime'] = 'application/pdf';
		$model['size'] = 0;
		$model['owner'] = $model['uid'];
		$model['access'] = 2;
		$model['protection'] = '';
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
		
		$op = $cl->load("space.add", ECROOT);
		$model['spvfpath'] = '/news/';
		$model['spvfname'] = $model['newstitle'].'.pdf';
		$model = $kernel->run($op, $model);
		return $model;
	}
}

?>