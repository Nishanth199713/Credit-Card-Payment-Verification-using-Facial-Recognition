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


<title>Online Credit Card Payment</title>


</head>


<body style="background:url(success.gif) no-repeat; background-size: cover">
  
  
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
				
					
					//$output=shell_exec("face_recognition /mnt/c/Users/dell/Desktop/Data/ /mnt/c/Users/dell/Desktop/Received/");
					//var_dump($output);
					//print_r($output);
					
					//$output = system('C:\Python27\python.exe cd .. cd ..  cd  ./mnt/c/Users/dell/Desktop  face_recognition ./Data/ ./Received/');
					
					//echo $output;
					
			
			       if(isset($_SESSION['uid'])){
					   echo ' <form action = "includes/logout.inc.php" method = "post">
							<button class="btn btn-success" type = "submit" name = "submit"> Logout </button>
							</form>' ;
					   
					   
				   }else{
					   echo '   <form action="includes/login.inc.php" method = "post" >	   
		                        <input type ="text" name="uid" placeholder="E-mail">
								<input type="password" name="pwd" placeholder="Password">
								<button class="btn btn-success" type="submit" name="submit">Login</button>
								</form>
								<a href="register.php"><button >Register</button></a>';
			            		   
				   }
			
			
			?>
		    
			    
			    
		    </div> 
 
 
          </div>
      </nav>

     </header>  
	 

</body>

</html>  