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


<body style="background:url(transaction.gif) no-repeat; background-size: cover">
  
  
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
	 
	<div class="container" >
	
			<form class="signup-form" action="validate.php" method="POST">

		  <div class="control-group">
            <label class="control-label" for="email"></label>
            <div class="controls">
              <input type="text" id="cno" name="amount" placeholder="Transaction Amount ( in ₹.)" class="input-xlarge">
            </div>
          </div><br>
			
          <div class="control-group">
            <label class="control-label" for="email">Card Number</label>
            <div class="controls">
              <input type="text" id="cno" name="cno" placeholder="Card Number" class="input-xlarge">
            </div>
          </div><br>
          <!-- Expiry-->
          <div class="control-group">
		  <p style="color:black; font-size:15px;">Card Expiry Date</p><br>
            <label class="control-label" for="password"></label>
            <div class="controls">
              <select class="span3" name="expiry_month" placeholder="Expiry Month" id="expiry_month">
                <option></option>
                <option value="01">Jan (01)</option>
                <option value="02">Feb (02)</option>
                <option value="03">Mar (03)</option>
                <option value="04">Apr (04)</option>
                <option value="05">May (05)</option>
                <option value="06">June (06)</option>
                <option value="07">July (07)</option>
                <option value="08">Aug (08)</option>
                <option value="09">Sep (09)</option>
                <option value="10">Oct (10)</option>1
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
              <select class="span2" name="expiry_year" placeholder="Expiry Year">
                <option value="13">2013</option>
                <option value="14">2014</option>
                <option value="15">2015</option>
                <option value="16">2016</option>
                <option value="17">2017</option>
                <option value="18">2018</option>
                <option value="19">2019</option>
                <option value="20">2020</option>
                <option value="21">2021</option>
                <option value="22">2022</option>
                <option value="23">2023</option>
              </select>
            </div>
          </div>
   
          <div class="control-group">
            <label class="control-label"  for="password_confirm" >Card CVV</label>
            <div class="controls">
              <input type="password" id="cvv" name="cvv" placeholder="CVV" class="span2">
            </div>
			<label class="control-label"  for="password_confirm">Pin</label>
            <div class="controls">
              <input type="password" id="pin" name="pin" placeholder="Pin" class="span2">
            </div>
		  </div>
		  
		  <div class="control-group">
            <div class="controls">
              <button class="btn btn-success">Pay</button>
            </div>
          </div>
</div>
			
		   
</body>

</html>  