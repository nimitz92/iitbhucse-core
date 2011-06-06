<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('StudentCreateContext.class.php');
require_once('StudentCreateTransform.class.php');

class StudentCreate implements Operation {
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
		return new StudentCreateContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return new StudentCreateTransform();
	}
	
	// Operation interface
	public function getResponseService(){
		return $this->adapter->getResponseService();
	}
}

?>