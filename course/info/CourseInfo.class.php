<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('CourseInfoContext.class.php');
require_once('CourseInfoTransform.class.php');

class CourseInfo implements Operation {
	protected 
		// adapter
		$adapter;
		
	// Constructor
	public function __construct(){
		$cl = new ComponentLoader();
		$this->adapter = $cl->load("base.adapter", SBROOT);
	}

	// Operation interface
	public function getRequestService(){
		return $this->adapter->getRequestService();
	}
	
	// Operation interface
	public function getContextService(){
		return new CourseInfoContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return new CourseInfoTransform();
	}
	
	// Operation interface
	public function getResponseService(){
		return $this->adapter->getResponseService();
	}
}

?>