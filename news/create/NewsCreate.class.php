<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('NewsCreateContext.class.php');
require_once('NewsCreateTransform.class.php');

class NewsCreate implements Operation {
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
		return new NewsCreateContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return new NewsCreateTransform();
	}
	
	// Operation interface
	public function getResponseService(){
		return $this->adapter->getResponseService();
	}
}

?>