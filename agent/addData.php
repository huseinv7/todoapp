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

		if(@$_GET['agent_id']){
			@$agent_id=$_GET['agent_id'];
			$where = "where agent_id = ".$agent_id;
		}else{
			$id=0;
			$where="";
		}


		//$query=mysqli_query($conn,"insert into user(title, description, category) values('".$_POST['title']."','".$_POST['description']."','".$_POST['category']."') where agent_id=".$agent_id);
		//$query=mysqli_query($conn,"insert into user(title, description, category) values('".$_POST['title']."','".$_POST['description']."','".$_POST['category']."')");

		//$query=mysqli_query($conn, "update user set title='".$_POST['title']."' ".$where);
		$query=mysqli_query($conn, "update user set title='".$_POST['title']."', category='".$_POST['category']."' " . $where);

		//$query=mysqli_query($conn, "insert into user(title, description, category) values() ".$where);

		if($query==true){
			$data[] = array("status"=>"success" , "status code"=>200);
		}else{
			$data[] = array("Message"=>"Failed", "status code"=>401);
		}
		return $data;

	}

	function response($data){
		echo json_encode($data);
	}

?>