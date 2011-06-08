<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('FacultyCreateContext.class.php');
require_once('FacultyCreateTransform.class.php');

class FacultyCreate implements Operation {
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
		return new FacultyCreateContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return new FacultyCreateTransform();
	}
	
	// Operation interface
	public function getResponseService(){
		return $this->adapter->getResponseService();
	}
}

?>