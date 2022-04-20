<?php 
$con = new mysqli("localhost","root","","userstudent");

function userInsert($name,$userName,$email,$phone,$status){
	global $con;
	$result=$con->query("INSERT INTO userstudent_table(name,userName,email,phone,status)VALUES('$name','$userName','$email','$phone','$status')");
	if ($result) {
		// return '<div class="alert alert-success"> SUCCESSFULLY INSERTED</div>';
		header('location:index.php');
	}else{
		return '<div class="alert alert-danger"> ERROR :'.$con->error.'</div>';
	}
}

function dataShow(){
	global $con;
	$result=$con->query("SELECT *FROM userstudent_table");
	return $result;
}

function userUpdateshow($id){
	global $con;
	$result=$con->query("SELECT *FROM userstudent_table WHERE id='$id'");
	return $result;
}
function userUpdate($name,$userName,$email,$phone,$status,$id){
		global $con;
	 $result=$con->query("UPDATE userstudent_table SET name='$name',userName='$userName',email='$email',phone='$phone',status='$status' WHERE id='$id'"); 
	 if ($result) {
			header('location:index.php');
		}else{
			return '<div class="alert alert-danger"> ERROR :'.$con->error.'</div>';
		}
	}
	function dataDelete($id){
	 global $con;
	 $result=$con->query("DELETE FROM userstudent_table WHERE id='$id'"); 
	 if ($result) {
			header('location:index.php');
		}else{
			return '<div class="alert alert-danger"> ERROR :'.$con->error.'</div>';
		}
	}
	function dactiveId($id){
		global $con;
	 $result=$con->query("UPDATE userstudent_table SET status='2' WHERE id='$id'"); 
	 if ($result) {
			header('location:index.php');
		}else{
			return '<div class="alert alert-danger"> ERROR :'.$con->error.'</div>';
		}
	}
	function activeId($id){
		global $con;
	 $result=$con->query("UPDATE userstudent_table SET status='1' WHERE id='$id'"); 
	 if ($result) {
			header('location:index.php');
		}else{
			return '<div class="alert alert-danger"> ERROR :'.$con->error.'</div>';
		}
	}


?>