<?php
session_start();

    include 'dbh.inc.php';
  if(isset($_POST['submit'])){
	 
	  $uid = $_POST['uid'];
	  $pwd = $_POST['pwd'];
      
	  //check for empty inputs
	  
	  if(empty($uid) || empty($pwd)){
		  header("Location: ../index.php?login=empty");
	      exit();  
		  
       }else{
		   
		   $sql = "SELECT * FROM user WHERE  email='$uid';";
		   $result = mysqli_query($conn , $sql );
		   $resultCheck = mysqli_num_rows($result);
		   if($resultCheck != 1){
		     header("Location: ../index.php?login=error");
	         exit();	   
		   }
		   else{
			   $row = mysqli_fetch_assoc($result);
				   if($row['pwd']== $pwd){
					
						$_SESSION['uid'] = $row['uid'];
						header("Location: ../transaction.php?login=success");
	                     exit();
				  }
			   }
			   
		   }
		   
	   }else{
	  
	  header("Location: ../index.php?login=error");
	  exit();
}