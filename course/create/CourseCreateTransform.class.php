<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	CourseCreateTransform class
 *
 *	@service enhancse-core.content.create
 *
**/
class CourseCreateTransform implements TransformService {

	/**
	 *	@interface TransformService
	**/
	public function transform($model){	
		$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		$op = $cl->load("content.create", ECROOT);
		$model['cntname'] = 'Content-'.$model['crsname'];
		$model['cntowner'] = 1;
		$model['cntstype'] = 1;
		$model['cntstyle'] = '';
		$model['cntttype'] = 1;
		$model['cnttpl'] = '<h2>${content.message}</h2>';
		$model['cntdtype'] = 1;
		$model['cntdata'] = json_encode(array('message' => 'Welcome to the '.$model['crsname'].'\'s Course Page'));
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
		
		$model['crshome'] = $model['cntid'];
		return $model;
	}
}

?>