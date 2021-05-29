<?php

session_start();
include "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html>


<head>
<link href="bootstrap1.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap1.js"></script>
<script src="jquery.js"></script>
<script src="jscript.js"></script>
<link rel="stylesheet" type="text/css" href="stylesheet1.css">
<meta charset="UTF-8">


<title>Online Credit Card Payment</title>


</head>


<body style="background:url(bg.gif) no-repeat; background-size: cover">
  
  
    <header >
      <nav>
		 <div  id="main" class="main-wrapper">
		    <ul>
			     <li><a href="index.php">HOME</a>
		    </ul>
			
			<div class="nav-login">
			
			<?php 
			       if(isset($_SESSION['uid'])){
					   echo ' <form action = "includes/logout.inc.php" method = "post">
							<button class="btn btn-success" type = "submit" name = "submit"> Logout </button>
							</form>' ;
					   
					   
				   }else{
					   echo '   <form action="includes/login.inc.php" method = "post" >	   
		                        <input type ="email" id="uid" name="uid" placeholder="E-mail">
								<input type="password" name="pwd" placeholder="Password">
								<button class="btn btn-success" type="submit" name="submit">Login</button>
								</form>' ."   ".'<form action="register.php" method="POST">
								<button class="btn btn-success" onclick="val()" >Register</button>';
			            		   
				   }
			
			
			?>
			    
		    </div> 
 
 
          </div>
      <nav>

     </header>  
	 
	 
           
		   <section class="main-container">
		       <div class="main-wrapper">
			   
				  <?php
				     if(isset($_SESSION['u_id']))
				     header("Location: transaction.php?signup=empty");
					 ?>
				</div>
			</section>
			

</body>

</html>  