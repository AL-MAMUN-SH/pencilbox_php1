




 <!-- LOG IN -->
 <?php include 'header.php';?>
<?php 
if(isset($_POST['login'])){
 $userName = $_POST['Uname'];
 $password = $_POST['password'];
 if ($userName=="almamoon602" && $password=="12345") {
 	session_start();
 	$_SESSION['userName']=$userName; 
 	header ('location:index.php');
 }elseif($userName=="almamoon603" && $password=="12345"){session_start();
 	$_SESSION['userName']=$userName; 
 	header ('location:index.php');}else{header('location:404.php');}

  }


?>

 <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-2">
	     	<div class="head bg-info p-3 mb-4 text-white ">
	          <h1 class="float-center text-dark">...LOGIN NEW USER... </h1>
	        </div>
				<form method="POST">
				  <div class="form-group">
				    <label for="name">UserName </label>
				    <input type="text" class="form-control" id="name" name="Uname"  placeholder="Enter your name">
				  </div>
				  <div class="form-group">
				    <label for="name">Password </label>
				    <input type="Password" class="form-control" id="name" name="password"  placeholder="Enter your name">
				  </div>
				  <button type="submit" name="login" class="btn btn-primary">LOgin</button>
				</form>
			</div>
     	</div>
  </div>
<!-- FORM END -->
<?php include 'footer.php';?>