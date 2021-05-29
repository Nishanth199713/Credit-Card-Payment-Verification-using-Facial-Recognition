<?php
	session_start();
	include "includes/dbh.inc.php";
	
	$tdate = date("Y/m/d");
	$cno = $_POST['cno'];
	$mon = $_POST['expiry_month'];
	$year = $_POST['expiry_year'];
	$cvv = $_POST['cvv'];
	$pin = $_POST['pin'];
	$expdate = $mon."/".$year;
	$amount = $_POST['amount'];
	$uid = $_SESSION['uid'];
	$sql = "SELECT * FROM card where uid = '$uid';";
	$result = mysqli_query($conn , $sql);
	$row = mysqli_fetch_assoc($result);
	$total=0;
	$count=0;
	$avg=0;
	if(($cno == $row['cno'])&&($cvv == $row['cvv'])&&($pin == $row['pin'])&&($expdate == $row['expdate'])){
		$m = date('m');
		$sql = "SELECT tamount from transaction where uid = '$uid' and month ='$m' ;";
		$result = mysqli_query($conn , $sql);
		$check = mysqli_num_rows($result);
		if($check<3){
			$sql1 = "INSERT INTO `transaction`( `uid`, `tamount`, `tdate` , `month`) VALUES ('$uid' , '$amount' , '$tdate' , '$m');";
			echo $sql1;
			mysqli_query($conn , $sql1);
	        header("Location: success.php?transaction_successful");
			exit();
		}
		else{
			
			while($row = mysqli_fetch_assoc($result)){
				
					$total = $total + $row['tamount'];
					$count++;
			}
			$sql3="SELECT avg_amount from average where uid = '$uid'";
			$result = mysqli_query($conn , $sql3);
			$row = mysqli_fetch_assoc($result);
			$temp = $total + $amount;
			if($temp>$row['avg_amount']){
				$_SESSION['amount'] = $amount;
				$_SESSION['date'] = $tdate;
				header("Location: security.php");
				exit();
			}				
			$avg = $total / $count;
			$l1 = $avg+1000;
			$l2 = $avg-1000;
		if(true){
			$sql1 = "INSERT INTO `transaction`( `uid`, `tamount`, `tdate`) VALUES ('$uid' , '$amount' , '$tdate');";
			mysqli_query($conn , $sql1);
			header("Location: success.php");
			exit();
			}
			else{
				$_SESSION['amount'] = $amount;
				$_SESSION['date'] = $tdate;
				header("Location: security.php");
				exit();
			}
		}
		
	}
	else{
		header("Location: failure.php");
		exit();
	}
