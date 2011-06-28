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
		$model['stgname'] = 'E.Book-'.$model['bookname'];
		$model['filepath'] = $model['bookpath'];
		$model['filename'] = 'E.book-'.$model['bookname'].'.pdf';
		$model['mime'] = 'application/pdf';
		$model['size'] = 0;
		$model['owner'] = $model['uid'];
		$model['access'] = 2;
		$model['protection'] = '';
		$model = $kernel->run($op, $model);
		
		if(!$model['valid'])
			return $model;
		
		$op = $cl->load("space.add", ECROOT);
		$model['spvfpath'] = '/ebook/';
		$model['spvfname'] = $model['bookname'].'.pdf';
		$model = $kernel->run($op, $model);
		
		return $model;
	}
}

?>