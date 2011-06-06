<?php 
require_once(SBINTERFACES);
require_once(SBKERNEL);
require_once(SBCOMLOADER);

class StudentCreateTransform implements TransformService {

	// TransformService interface
	public function transform($model){
		$kernel = new ServiceKernel();
		$cl = new ComponentLoader();
		
		$op = $cl->load("user.register", ECROOT);
		$model = $kernel->run($op, $model);
		
		return $model;
	}
}

?>