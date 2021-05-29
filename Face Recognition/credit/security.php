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
<script src="webcam.js"></script>
<link rel="stylesheet" type="text/css" href="stylesheet1.css">
<meta charset="UTF-8">
    <style type="text/css">
        body { font-family: Helvetica, sans-serif; }
        h2, h3 { margin-top:0; }
        form { margin-top: 15px; }
        form > input { margin-right: 15px; }
        #results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }
    </style>

<title>Online Credit Card Payment</title>

</head>

<body style="background:url(security.gif) no-repeat; background-size: cover" >
  
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
	 
<h2>Show me your face</h2>
	<div id="results"></div>
    <div id="webcam"></div>
	 <form>
        <input class="btn btn-success" type=button value="Take Snapshot" onClick="captureimage()">
    </form>	
	<form id="f1" display="none" action="rekog.php" method="POST">
		<input type="hidden" name="s1" id="s1" value=""></input>
		<input class="btn btn-success" id="sub" display="none" type="submit" value="Submit">
	</form>
   		

	<script language="JavaScript">
		Webcam.set({
            width: 600,
            height: 460,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
		Webcam.attach( '#webcam' );
		function captureimage() {
            // take snapshot and get image data
            Webcam.snap( function(data_uri) {
                // display results in page
                 
                     
                Webcam.upload( data_uri, 'saveimage.php', function(code, text) {
					var x=document.getElementById('f1');
					x.style.display="block";
					var y=document.getElementById("sub");
					y.style.display="block";
                    document.getElementById('s1').value = text;
					
                } );    
            } );
        }
	</script>
	
</body>
</html>
    