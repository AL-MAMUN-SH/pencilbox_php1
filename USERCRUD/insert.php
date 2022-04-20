 <!-- form -->
 <?php include 'header.php';
	session_start();
  if (!isset($_SESSION['userName'])) {
  	header('location:login.php');
  }


 ?>
 <?php include 'function.php';
  if(isset($_POST['submit'])){
  	$name=$_POST['name'];
  	$userName=$_POST['userName'];
  	$email=$_POST['email'];
  	$phone=$_POST['phone'];
  	$status=$_POST['status'];
  	if(empty($name)){
  		echo '<div class="alert alert-danger"> Name field is required</div>';
  	}elseif(empty($userName)){
  		echo '<div class="alert alert-danger"> userName field is required</div>';
  	}elseif(empty($email)){
  		echo '<div class="alert alert-danger"> email field is required</div>';
  	}elseif(empty($phone)){
  		echo '<div class="alert alert-danger"> phone field is required</div>';
  	}elseif(empty($status)){
  		echo '<div class="alert alert-danger"> status field is required</div>';
  	}else{
  		$result=userInsert($name,$userName,$email,$phone,$status);
  		echo $result;
  	}
  }

 ?>

 <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-2">
	     	<div class="head bg-info p-3 mb-4 text-white ">
	          <h1 class="float-left text-dark">USER Insert . . . . . </h1>
	          <a href="index.php" class="btn btn-danger float-right "><i class="fa-solid fa-eye"></i>&nbsp;&nbsp;USER LIST</a>
	        </div>
				<form method="POST">
				  <div class="form-group">
				    <label for="name">Name </label>
				    <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($_POST['submit'])){echo $name;}?>" placeholder="Enter your name">
				  </div>
				  <div class="form-group">
				    <label for="userName">UserName </label>
				    <input type="text" class="form-control" id="userName" name="userName" value="<?php if(isset($_POST['submit'])){echo $userName;}?>" placeholder="Enter your userName">
				  </div>
				  <div class="form-group">
				    <label for="email">Email </label>
				    <input type="text" class="form-control" id="email" name="email" value="<?php if(isset($_POST['submit'])){echo $email;}?>" placeholder="Enter your Email">
				  </div>
				  <div class="form-group">
				    <label for="phone">Phone </label>
				    <input type="text" class="form-control" id="phone" name="phone" value="<?php if(isset($_POST['submit'])){echo $phone;}?>" placeholder="Enter your Phone number">
				  </div>
				  <div class="form-group">
				    <label for="status">Status </label>

				    <select name="status" id="status" class="form-control">
				    	<option value="0">---Select---</option>
				    	<option value="1">Active</option>
				    	<option value="2">Inactive</option>
				    </select>
				  </div>

				  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</form>
     		</div>
     	</div>
  </div>
<!-- FORM END -->
<?php include 'footer.php';?>