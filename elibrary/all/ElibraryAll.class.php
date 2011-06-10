<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('ElibraryAllContext.class.php');
require_once('ElibraryAllTransform.class.php');

class ElibraryAll implements Operation {
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
		return new ElibraryAllContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return new ElibraryAllTransform();
	}
	
	// Operation interface
	public function getResponseService(){
		return $this->adapter->getResponseService();
	}
}

?>