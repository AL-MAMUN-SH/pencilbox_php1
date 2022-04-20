<?php include 'header.php';
	session_start();
  if (!isset($_SESSION['userName'])) {
  	header('location:login.php');
  }
?>
 <!-- form -->
		
		<!-- FORM END -->


	<!-- table -->
     <div class="container">
      <div class="row">
        <div class="col-md-10 offset-md-1">
	     	<div class="head bg-info p-3 mb-4 text-white ">
	          <h1 class="float-left text-dark">USER LIST.. Name is :
	          	<?php 
	          			if(isset($_SESSION['userName'])){echo $_SESSION['userName']; }
	             ?>
	          	
	          </h1>
	         <a href="logout.php" type="button" class="btn btn-warning text-info float-right ml-3">logout</a>
	          <a href="insert.php" class="btn btn-danger float-right"><i class="fa fa-add"></i>&nbsp;&nbsp; ADD USER </a>
	        </div>
	        <table id="table_id" class="display">
	        	<thead>
	        		<tr>
	        			<th>SL.</th>
	        			<th>NAME</th>
	        			<th>USERNAME</th>
	        			<th>EMAIL</th>
	        			<th>PHONE</th>
	        			<th>STATUS</th>
	        			<th>ACTION</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        	
	        <?php 
	         include 'function.php';
	         // etah holo delete er jonno..
	         if(isset($_GET['id'])){
	         	$data=dataDelete($_GET['id']);
	         }
	         // etah holo delete er jonno end..
	         if(isset($_GET['dId'])){
	         	$data=dactiveId($_GET['dId']);
	         }
	         if(isset($_GET['aId'])){
	         	$data=activeId($_GET['aId']);
	         }

	         $data=dataShow();
	         if ($data->num_rows>0) {
	         	$sl=1;
	         	while($show=$data->fetch_assoc()){
	         ?>
	         <tr>
	         	<td><?php echo $sl;?></td>
	         	<td><?php echo $show['name'];?></td>
	         	<td><?php echo $show['userName'];?></td>
	         	<td><?php echo $show['email'];?></td>
	         	<td><?php echo $show['phone'];?></td>
	         	<td>

	         		<?php 
	         		if($show['status']==1){echo '<a class="badge badge-warning" href="index.php?dId='.$show["id"].'">Inactive</a>';
                      }else{echo '<a class="badge badge-primary" href="index.php?aId='.$show["id"].'">Active</a>';}
               ?>
                      </td>

                      <td>
                      	<a href="edit.php?userId=<?php echo $show['id'];?>" class="btn btn-success btn-sm"><i class="fa-solid fa-eye"></i></a>
                      	<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $show['id'];?>"><i class="fa-solid fa-trash-can"></i></button>
                      </td>
	         </tr>
							<!-- Modal -->
							<div class="modal fade" id="exampleModal<?php echo $show['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title text-primary text-center" id="exampleModalLabel">
							        	Confirmation Message.
							        </h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body text-success">
							       ARE YOU SURE WANT TO DELETE ?
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
							        <a href="index.php?id=<?php echo $show['id'];?>" type="button" class="btn btn-danger btn-sm">Confirm</a>
							      </div>
							    </div>
							  </div>
							</div>

	        <?php 
		         $sl++;

		       }
	         	}else{echo "DATA NOT FOUND";}
	        ?>

	        	</tbody>
	        </table>
	    </div>
	</div>
</div>

	<!-- table END -->


<!--  -->
<?php include 'footer.php';?>