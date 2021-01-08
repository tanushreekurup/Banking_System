<!DOCTYPE html>
<html>
<head>
	<title>Confirm Transfer</title>
		<title>Transfer_to</title>
	<style type="text/css">
				html,body{
			height: 100%;
		}

		body{
			padding-top: 0px;
		    position: relative;
		    z-index: 1;
		    height: 100%;
		}

		

		body:before {
		    content: "";
		    position: absolute;
		    z-index: -1;
		    top: 0;
		    bottom: 0;
		    left: 0;
		    right: 0;
		    background: url(images/b13.jpg); center center;
		    background-size: 100%;
		    background-repeat: no-repeat;
		    opacity: .4;
		}
		
		
		
.header {
  overflow: hidden;
  padding: 20px 10px;
  background: rgb(0, 0, 0, 0.1) /* Purple background with 40% opacity */
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
  padding-top: 25px;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: #FC913A   ;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}

.logo_img{
	float: left;
	height: 75px;
	width: 75px;
}

.section{
		margin: auto;
		padding-top: 50px;
	  	margin: auto;
	  	width: 60%;
	  	border: 3px double #FC913A;
	  	padding: 10px;
	  	text-align: center;
	  	margin-top: 10%;
	  	font-size:40px;
	  	color: #474643;
	  	font-family: Optima;
	  	text-shadow: 1px 1px #FC913A;
	  }



	</style>
</head>
<body>

<div class="header">
	<div class="logo_img">
		<img src="images/2.png" class="logo_img">
	</div>
  <a href="#default" class="logo">BANK</a>
  <div class="header-right">
    <a class="active" href="home_page.html">Home</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
  </div>
</div>

<div class='section'>
<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "banking_system";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
	if ($con->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	}


	if(isset($_GET['from'])) {
	$from= $_GET['from'];
	$from_name_query = mysqli_query($con,"SELECT Name from customers WHERE ID=" . $from);
	
	
	
	if(isset($_GET['to'])){
	$to= $_GET['to'];
	$to_name_query = mysqli_query($con,"SELECT Name from customers WHERE ID=" . $to);

	if(isset($_GET['amount'])){
	$amount= $_GET['amount'];
	
	
	echo "Paying RS. " . $amount . " from account with ID ".$from." to  account with ID ".$to.".";


	$sqlf="SELECT Name FROM customers WHERE ID=$from";
	$resultf = $con->query($sqlf);
	$from_name=mysqli_fetch_array($resultf);


	$sqlt="SELECT Name FROM customers WHERE ID=$to";
	$resultt = $con->query($sqlt);
	$to_name=mysqli_fetch_array($resultt);

	
	$sender_balance = mysqli_query($con,"SELECT * FROM customers where ID=" . $from);

		if ($amount <= $sender_balance && $from != $to) {
			
			$sql1 = "UPDATE customers SET Balance=(Balance-$amount) WHERE ID=$from";

			$sql2 = "UPDATE customers SET Balance=(Balance+$amount) WHERE ID=$to";

			if ($con->query($sql1) === TRUE && $con->query($sql2) === TRUE) {
	  			echo "<br><br>Money Transferred Successfully";
	  			
	  			$sql3="INSERT INTO transfers VALUES (curdate(),curtime(), '$from_name[0]', '$to_name[0]', $amount)";
	  			if ($con->query($sql3) === TRUE) {
	  				echo "<br>Transfer table Updated";
	  			}
	  			else{
	  				echo "<br>Error message = ".mysqli_error($con);
	  			}
			} 


			else {
			  echo "<br><br>Transfer unsuccessful";
			}
		}
	}}}

$con->close();

?>
</div>


</body>
</html>