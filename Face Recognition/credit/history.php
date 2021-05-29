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


<body style="background:url(index1.jpg) no-repeat; background-size: cover">
  
  
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
							<button class="btn btn-success" type = "submit" name = "submit"> Logout </button>
							</form>' ;
					   
					   
				   }else{
					   echo '   <form action="includes/login.inc.php" method = "post" >	   
		                        <input type ="text" name="uid" placeholder="E-mail">
								<input type="password" name="pwd" placeholder="Password">
								<button class="btn btn-success" type="submit" name="submit">Login</button>
								</form>
								<a href="register.php"><button class="btn btn-success" >Register</button></a>';
			            		   
				   }
			
			
			?>
		    
			    
			    
		    </div> 
 
 
          </div>
      </nav>

     </header>  
	 
<div class="container">
				
				<table >
				
					<tr>
					
						<th>Transaction Amount</th>
						<th>Transaction Date</th>
					
					</tr>
					
					
					
					<?php
						$uid = $_SESSION['uid'];
						$sql = "SELECT * from transaction where uid ='$uid';";
						$result = mysqli_query($conn , $sql);

						
						while($row = mysqli_fetch_assoc($result) ){
						echo "<tr>";
						echo "<td>".$row['tamount']."</td>";
						echo "<td>".$row['tdate']."</td>";
						echo "</tr>";
						}
					?>
					
				</table>
</div>
		   
</body>

</html>  