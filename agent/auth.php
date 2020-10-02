<?php
	$conn=mysqli_connect("localhost","root","","todoapp");
	$request = $_SERVER['REQUEST_METHOD'];
	//print($request);


	switch ($request) {
		case 'POST':
			response(validateData());
			break;
		
		default:
			# code...
			break;
	}


	function validateData(){
		global $conn;


		$query=mysqli_query($conn, "select * from user where agent_id='".$_POST['agent_id']."' and password='".$_POST['password']."'");
		//list($total) = mysql_fetch_row($query);
		$roww=mysqli_num_rows($query);
		if($roww==0){
			$data[] = array("status"=>"failure" , "status code"=>401);
		}else{
			$data[] = array("status"=>"success" , "agent_id"=>$_POST['agent_id'], "status code"=>200);
		}
		return $data;

	}

	function response($data){
		echo json_encode($data);
	}

?>