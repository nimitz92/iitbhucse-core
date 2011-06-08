 <?php 
require_once(SBINTERFACES);

/**
 *	FacultyCreateContext class
 *
 *	@param fname					string			Faculty name
 *	@param fphone	    			string			Faculty phone no
 *	@param femail					string			Faculty email
 *	@param fdesignation			integer			Faculty designation 1=Professor 2=Assistant professor 3=Reader 4=Lecturer
 *	@param fqualification		string			Faculty qualification
 *	@param username	   			string			Username
 *	@param subject					string			Subject
 *	@param message	    		string			Message
 *	@param conn 					resource 		Database connection
 *	
 *	@return fid						long int			Faculty ID generated
 *	@return valid 					boolean		Processed without errors
 *	@return msg						string			Error message if any
 *
**/
class FacultyCreateContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$model['email'] = $model['femail'];
		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($context){
		$conn = $model['conn'];
		$fid = $model['uid'];
		$conn = $model['conn'];
		$fid = $model['uid'];
		$fname = $conn->escape($model['stname']);
		$fdesignation = $model['fdesignation'];
		$fphone = $conn->escape($model['fphone']);
		$fqualification = $conn->escape($model['fqualification']);		
		$femail = $conn->escape($model['femail']);
		$finterset = $conn->escape($model['finterset']);
		$result = $conn->getResult("insert into faculty (fid, fname, fdesignation, fqualification, femail, fphone, finterest) values ($fid, '$fname', $fdesignation, '$fqualification', '$femail', '$fphone', '$finterest');", true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @setcontext/faculty.create';
			return $model;
		}
		
		$model['valid'] = true;
		$model['fid'] = $fid;
		return $model;
	}
}

?>
