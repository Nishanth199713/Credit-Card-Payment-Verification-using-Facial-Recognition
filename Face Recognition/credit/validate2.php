<?php

session_start();

include "includes/dbh.inc.php";

$ans  = $_POST['ans'];
$uid = $_SESSION['uid'];
$amount = $_SESSION['amount'];
$tdate = $_SESSION['date'];
$sql = "SELECT ans from user where uid = '$uid';";

$result = mysqli_query($conn , $sql);

$row = mysqli_fetch_assoc($result);

if($row['ans'] == $ans){
			$sql1 = "INSERT INTO `transaction`( `uid`, `tamount`, `tdate`) VALUES ('$uid' , '$amount' , '$tdate');";
			mysqli_query($conn , $sql1);
	        header("Location: success.php?transaction_successful");
			exit();
}

else {
	
	 header("Location: failure.php");
	  exit();
}