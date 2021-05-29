<?php

session_start();

include "includes/dbh.inc.php";

$ans  = $_POST['ans'];
$uid = $_SESSION['uid'];
$eamount = $_SESSION['ea'];
$sql = "SELECT ans from user where uid = '$uid';";

$result = mysqli_query($conn , $sql);

$row = mysqli_fetch_assoc($result);

if($row['ans'] == $ans){
			$sql1 = "INSERT INTO `average`( `uid`, `avg_amount`) VALUES ('$uid' , '$eamount' );";
			mysqli_query($conn , $sql1);
	        header("Location: success.php?transaction_successful");
			exit();
}

else {
	
	 header("Location: failure.php");
	  exit();
}