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
    <style type="text/css">
        body { font-family: Helvetica, sans-serif; }
        h2, h3 { margin-top:0; }
        form { margin-top: 15px; }
        form > input { margin-right: 15px; }
        #results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }
    </style>

<title>Credi Card Payment</title>


</head>


<body style="background:url(rekog.gif) no-repeat; background-size: cover">
  
  
    <header >
      <nav>
		 <div  id="main" class="main-wrapper">
		    <ul>
				 <li><a href = "settings.php" style="text-decoration:none;">&nbsp &nbsp Settings</a>
				 <li><a href="transaction.php" style="text-decoration:none;">&nbsp &nbsp Transaction</a>
				 <li><a href="history.php" style="text-decoration:none;">&nbsp &nbsp History</a>
		    </ul>
	</header>		
			<br>
			<br>
			<br>
			
			<div class="nav-login">
			<br>
			<br>
			<br>
			<center>
<?php

	$samp=$_POST['s1'];
	#echo $samp;
	$user=$_SESSION['uid'];
	$ans= exec("cd c:/Users/dell/Desktop && python rekognition.py ".$user." ".$samp);
	if(strcmp($ans,"true")==0)
	{
		echo '<form action="success.php" method="POST">
				<input class="btn btn-success" type="submit" name="submit"> </input> 
				</form>';
	}
	else
	{
		echo '<form action="failure.php" method="POST">
				<input class="btn btn-success" type="submit" name="submit"> </input> 
				</form>';
	}
?>

</center>
</div>
</body>
</html>