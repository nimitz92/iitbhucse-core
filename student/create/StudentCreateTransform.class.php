<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

/**
 *	StudentCreateTransform class
 *
 *	@service enhancse-core.user.register
 *	@service enhancse-core.storage.create
 *	@service enhancse-core.space.add
 *	@service enhancse-core.content.create
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
		// Uniqueness kept be using username ... email can also be used
		$model['filename'] = 'Resume-'.$model['username'].'.pdf';
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
		$model['spvfname'] = $model['stname'].'.pdf';
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
		
		$model['stresume'] = $model['spid'];
		
		$op = $cl->load("storage.create", ECROOT);
		$model['stgname'] = 'Photo-'.$model['stname'];
		$model['filepath'] = $model['stphpath'];
		$model['filename'] = 'Photo-'.$model['username'].'.png';
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
		$model['spvfname'] = $model['stname'].'.png';
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
			
		$model['stphoto'] = $model['spid'];
		
		$op = $cl->load("content.create", ECROOT);
		$model['cntname'] = 'Content-'.$model['username'];
		$model['cntowner'] = $model['uid'];
		$model['cntstype'] = 1;
		$model['cntstyle'] = '';
		$model['cntttype'] = 1;
		$model['cnttpl'] = '<h2>${content.message}</h2>';
		$model['cntdtype'] = 1;
		$model['cntdata'] = json_encode(array('message' => 'Welcome to '.$model['stname'].'\'s Home Page'));
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
		
		$model['sthome'] = $model['cntid'];
		return $model;
	}
}

?>