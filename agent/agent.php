<?php
	$conn=mysqli_connect("localhost","root","","todoapp");
	$request = $_SERVER['REQUEST_METHOD'];


	switch ($request) {
		case 'POST':
			response(addData());
			break;
		
		default:
			# code...
			break;
	}


	function addData(){
		global $conn;

		//$query=mysqli_query($conn,"insert into user(agent_id,password) values('".$_POST['agent_id']."','".$_POST['password']."')");
		$query=mysqli_query($conn,"insert into user(agent_id, password) values('".$_POST['agent_id']."', md5('".$_POST['password']."'))");

		if($query==true){
			$data[] = array("status"=>"account created" , "status code"=>200);
		}else{
			$data[] = array("Message"=>"Failed to insert");
		}
		return $data;

	}

	function response($data){
		echo json_encode($data);
	}

?>