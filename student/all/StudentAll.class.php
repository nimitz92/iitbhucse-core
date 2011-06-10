<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('StudentAllContext.class.php');
require_once('StudentAllTransform.class.php');

class StudentAll implements Operation {
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
		return new StudentAllContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return new StudentAllTransform();
	}
	
	// Operation interface
	public function getResponseService(){
		return $this->adapter->getResponseService();
	}
}

?>