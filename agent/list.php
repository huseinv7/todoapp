<?php
	$conn=mysqli_connect("localhost","root","","todoapp");
	$request = $_SERVER['REQUEST_METHOD'];
	//print($request);


	switch ($request) {
		case 'GET':
			response(getData());
			break;
		
		default:
			# code...
			break;
	}


	function getData(){
		global $conn;

		if(@$_GET['agent_id']){
			@$agent_id=$_GET['agent_id'];
			$where = "where agent_id = ".$agent_id;
		}else{
			$id=0;
			$where="";
		}
		try{
			$query = mysqli_query($conn, "select * from user ".$where." order by tododate");
			while($row = mysqli_fetch_assoc($query)){
				$data[] = array("agent_id"=>$row['agent_id'], "password"=>$row['password'], "todolist"=>$row['todolist'], "tododate"=>$row['tododate']);
			}
			return $data;
		}
		catch(Exception $e){
			$data[] = array("status"=>"failure");
			return data;
		}


	}


	function response($data){
		echo json_encode($data);
	}

?>