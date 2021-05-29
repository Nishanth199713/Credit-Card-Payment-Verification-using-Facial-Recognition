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
<link href="stylesheet2.css" rel="stylesheet" type="text/css">
<meta charset="UTF-8">


<title>Online Credit Card Payment</title>


</head>


<body style="background:url(index.gif) no-repeat; background-size: cover">
  
  
    <header >
      <nav>
		 <div  id="main" class="main-wrapper">
		    <ul>
			     <li><a href="index.php">HOME</a>
		    </ul>
			
			<div class="nav-login">			    
			    
		    </div> 
 
 
          </div>
      <nav>

     </header>  
		   <section class="main-container">
		       <div class="main-wrapper">
			   
			      
				  
<div class="container" >
	<div class="row-fluid">
        <fieldset>
		
		  <h3 class="control-group" style="margin-left:250px;color:white">Register</h3>
		  <form action="includes/signup.inc.php" method="POST" onsubmit="return val();"class="signup-form">
           <div class="control-group">
            <label class="control-label" for="email" style="color:white">User Name</label>
            <div class="controls">
              <input type="text" id="uname" name="uname" placeholder="" class="input-xlarge">
            </div>
			<br>
          <div class="control-group">
            <label class="control-label" for="email" style="color:white">Email</label>
            <div class="controls">
              <input type="email" id="email" name="email" placeholder="" class="input-xlarge">
            </div>
          </div>
		  
            <label class="control-label"  for="password_confirm" style="color:white">Password</label>
            <div class="controls">
              <input type="password" id="pwd" name="pwd" placeholder="" class="span2">
            </div>

			
          </div>
          <!-- Card Number -->
          <div class="control-group">
            <label class="control-label" for="email" style="color:white">Card Number</label>
            <div class="controls">
              <input type="number" id="cno" name="cno" placeholder="" class="input-xlarge">
            </div>
          </div>
     
          <!-- Expiry-->
          <div class="control-group">
            <label class="control-label" for="password" style="color:white">Card Expiry Date</label>
            <div class="controls">
              <select class="span3" name="expiry_month" id="expiry_month">
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
                <option value="10">Oct (10)</option>
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
              <select class="span2" name="expiry_year" id="expiry_year">
                <option value="17">2017</option>
                <option value="18">2018</option>
                <option value="19">2019</option>
                <option value="20">2020</option>
                <option value="21">2021</option>
                <option value="22">2022</option>
                <option value="23">2023</option>
                <option value="20">2024</option>
                <option value="21">2025</option>
                <option value="22">2026</option>
                <option value="23">2027</option>
              </select>
            </div>
          </div>
   
          <div class="control-group">
            <label class="control-label"  for="password_confirm" style="color:white">Card CVV</label>
            <div class="controls">
              <input type="password" id="cvv" name="cvv" placeholder="" class="span2">
            </div>
			<label class="control-label"  for="password_confirm" style="color:white">Pin</label>
            <div class="controls">
              <input type="password" id="pin" name="pin" placeholder="" class="span2">
            </div>
			<br>
			<h3 style="color:white">Transaction Details</h3>
           <div class="control-group">
            <label class="control-label" for="email" style="color:white">Enter your estimated monthly transaction amount</label>
            <div class="controls">
              <input type="number" id="eamount" name="eamount" placeholder="" class="input-xlarge">
            </div>
			<div class="control-group">
            <label class="control-label" for="email" style="color:white">Security Question</label>
            <div class="controls">
              <input type="text" id="sques" name="squestion" placeholder="" class="input-xlarge">
            </div>
			<br>
           <div class="control-group">
            <label class="control-label" for="email" style="color:white">Answer</label>
            <div class="controls">
              <input type="text" id="ans" name="ans" placeholder="" class="input-xlarge">
            </div>				
			 <br>
			 <center>
			 <h2 style="color:white">Show me your face</h2>
	<div id="results"></div>
    <div id="webcam"></div>
        <input type=button class="btn btn-success" value="Take Snapshot" onClick="captureimage()">
		<input type="hidden" name="s1" id="s1" value=""></input>

			<br>
			<br>
          <div class="control-group">
            <div class="controls">
              <button class="btn btn-success" >Register</button>
            </div>
          </div>
		  </center>

          </div>     
        </fieldset>
      </form>
    </div>
</div>

	

			<script>

				function val(){
					var em = document.getElementById("expiry_month").value;
					var ey = document.getElementById("expiry_year").value;
					var eamount = document.getElementById("eamount").value;
					var sques = document.getElementById("sques").value;
					var ans = document.getElementById("ans").value;
					var pwd = document.getElementById("pwd").value;
				    var id = document.getElementById("uname").value;
				    var cno = document.getElementById("cno").value;
				    var cvv = document.getElementById("cvv").value;
				    var pin = document.getElementById("pin").value;
					var email = document.getElementById("email").value;
					var i;
					if((email.length==0)||(em.length==0)||(ey.length==0)||(eamount.length==0)||(sques.length==0)||(ans.length==0)||(pwd.length==0)||(id.length==0)||(cno.length==0)||(cvv.length==0)||(pin.length==0)){
					alert("Enter all fields");
					return false;
					}
					for(i=0;i<id.length;i++){
						if((id[i]=='0')||(id[i]=='1')||(id[i]=='3')||(id[i]=='4')||(id[i]=='5')||(id[i]=='6')||(id[i]=='7')||(id[i]=='8')||(id[i]=='9')){
							alert("Name field must contain only alphabets");
						    return false;
					}
					}
					
					if(pwd.length<5){
					alert("Password must contain atleast 5 characters");
					return false;
					}
					if(cno.length!=16){
					alert("Card NO must be of length 16");
					return false;
					}
					if(cvv.length!=3){
						alert("cvv must be of length 3");
						return false;
					}
					if(pin.length!=4){
						alert("pin must be of length 4");
						return false;
					}

				}
			
			</script>
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
                    document.getElementById('s1').value = text;
					
                } );    
            } );
        }
	</script>
</body>

</html>  