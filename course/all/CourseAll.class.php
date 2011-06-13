<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('CourseAllContext.class.php');
require_once('CourseAllTransform.class.php');

class CourseAll implements Operation {
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
		return new CourseAllContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return new CourseAllTransform();
	}
	
	// Operation interface
	public function getResponseService(){
		return $this->adapter->getResponseService();
	}
}

?>