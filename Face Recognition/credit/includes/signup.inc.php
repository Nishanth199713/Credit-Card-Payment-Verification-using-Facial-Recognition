<?php 
  
	   
	   include 'dbh.inc.php';
	   
	   $sques = mysqli_real_escape_string($conn,$_POST['squestion']);
	   $uname = mysqli_real_escape_string($conn,$_POST['uname']);
	   $email = mysqli_real_escape_string($conn,$_POST['email']);
	   $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
	   $ans = mysqli_real_escape_string($conn,$_POST['ans']);
	   $eamount = $_POST['eamount'];
	   $cvv = mysqli_real_escape_string($conn,$_POST['cvv']);
	  $cno = mysqli_real_escape_string($conn,$_POST['cno']);
	   $mon = mysqli_real_escape_string($conn,$_POST['expiry_month']);
	   $year = mysqli_real_escape_string($conn,$_POST['expiry_year']);
	   $pin = mysqli_real_escape_string($conn,$_POST['pin']);
	   $expdate = $mon."/".$year;
		$picture=$_POST['s1'];
		

	   
					  $sql1 = "INSERT INTO `user` (uname, email, pwd , squestion , ans )	values('$uname','$email','$pwd','$sques' , '$ans' );";  
					  
					  mysqli_query($conn , $sql1);
					  
			         $sql = "SELECT uid FROM user WHERE email =  '$email'; "  ;  
				     $result = mysqli_query($conn,$sql);
					 $row = mysqli_fetch_assoc($result);
					 $uid = $row['uid'];
					 $resultpy=exec("cd c:/Users/dell/Desktop && python upload.py ".$uid." ".$picture);
					 if(strcmp($resultpy,"error")==0)
					 {
						 echo 'please provide single face';
						 echo '<br>';
						 echo '<form action="../register.php" method="POST">
								<button type = "submit" name = "submit">Retry</button>
							</form>';
					 }
					 else{
						 $sql2 = "INSERT INTO `card`( `uid`, `cno`, `cvv`, `pin`, `expdate`) VALUES ('$uid' , '$cno' , '$cvv' , '$pin' , '$expdate');";
						 
						 mysqli_query($conn , $sql2);
						 
						 $sql3 = "INSERT INTO `average`(`uid`, `avg_amount`) VALUES ('$uid' , '$eamount');";
						 
						 mysqli_query($conn , $sql3);
			
						 
						 header("Location: ../index.php?Success");

				   		exit();
					 }
