<php	
	$this->response->header('Access-Control-Allow-Origin','*');
	$this->response->header('Access-Control-Allow-Methods','POST');
	$this->response->header('Access-Control-Allow-Headers','X-Requested-With');
	$this->response->header('Access-Control-Max-Age','172800');
	$this->response->type('json');
	if(isset($users)){
		$this->response->type('json');
		echo json_encode($users);
	}
?>	

