<?php

session_start();
include "includes/dbh.inc.php"
?>

<!DOCTYPE html>
<html>


<head>
<link href="bootstrap1.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap1.js"></script>
<script src="jquery.js"></script>
<link rel="stylesheet" type="text/css" href="stylesheet1.css">
<meta charset="UTF-8">


<title>Online Credit Card Fraud Detection</title>


</head>


<body >
  
  
    <header >
      <nav>
		 <div  id="main" class="main-wrapper">
		    <ul>
				 <li><a href = "settings.php" style="text-decoration:none;">&nbsp &nbsp Settings</a>
				 <li><a href="transaction.php" style="text-decoration:none;">&nbsp &nbsp Transaction</a>
				 <li><a href="history.php" style="text-decoration:none;">&nbsp &nbsp History</a>
		    </ul>
			
			<div class="nav-login">
			
			<?php 
			       if(isset($_SESSION['uid'])){
					   echo ' <form action = "includes/logout.inc.php" method = "post">
							<button type = "submit" name = "submit"> Logout </button>
							</form>' ;
					   
					   
				   }else{
					   echo '   <form action="includes/login.inc.php" method = "post" >	   
		                        <input type ="text" name="uid" placeholder="E-mail">
								<input type="password" name="pwd" placeholder="Password">
								<button type="submit" name="submit">Login</button>
								</form>
								<a href="register.php"><button >Register</button></a>';
			            		   
				   }
			
			
			?>
		    
			    
			    
		    </div> 
 
 
          </div>
      </nav>

     </header>  
	 
<h2>Answer Security Question</h2>
				
					<form action="validate3.php" method="POST" >
					<br>
					<?php
					 $eamount = $_POST['eamount'];
					 $_SESSION['ea'] = $eamount;
					 $uid = $_SESSION['uid'];
					 $sql = "SELECT squestion from user where uid = '$uid';";
					 
					 $result = mysqli_query($conn , $sql);
					 
					 $row = mysqli_fetch_assoc($result);
					 
					 $ques = $row['squestion'];
					 
					 echo "<p> " . $ques ."</p><br>";
					 
					 ?>
					 <input type = "password" name="ans" placeholder="Enter Answer">
					 <button> Submit </button>
					 </form>
</body>

</html>  