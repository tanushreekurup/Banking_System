<!DOCTYPE html>
<html>
<head>
	<title>Transfer_to</title>
	<style type="text/css">
				html,body{
			height: 100%;
		}

		body{
			padding-top: 0px;
		    position: relative;
		    z-index: 1;
		    height: 120%;
		}

		

		body:before {
		    content: "";
		    position: absolute;
		    z-index: -1;
		    top: 0;
		    bottom: 0;
		    left: 0;
		    right: 0;
		    background: url(images/b19.jpg); center center;
		    background-size: 200%;
		    background-repeat: repeat-y;
		    opacity: .3;
		}
		
		
		table{

			width:70%;
			height: 100px;
			text-align: center;
			font-size:20px;
			border:1px solid black;
			/*background-color: #ecede8;*/
			font-family:Apple Chancery, cursive;
			border-collapse: separate;
			background-color: rgb(251, 251, 251);
		}

		  table.center {
    		margin-left:auto; 
    		margin-right:auto;
    	}

		.button {
		 height: 20;
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

.links {
  color: #00203FFF ;
  background-color: transparent;
  text-decoration: none;

}

.button {
		  background-color: #FC913A;
		  border: none;
		  color: white;
		  padding: 15px 32px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		  margin: 4px 2px;
		}

		input[type=text] {
		  
		  padding: 15px 32px;
		  margin: 4px 2px;
		  display: inline-block;
		  border: 1px solid #FC913Ae;
		  border-radius: 4px;
		  box-sizing: border-box;
		  font-size: 16px;
		  text-align: center;
		}

		::placeholder {
		  color: #FC913A;
		  opacity: 1;
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

	$sql = "SELECT ID,Name FROM customers";
	$result = $con->query($sql);

	echo "<br><br>";

	echo "<form action='confirm.php' method='GET'>";
	echo "<center style='color:#FC913A;font-size:25px;'>Select an account to transfer money TO</center>";

	echo "<table border='1' class='center'>
	<tr>
	<th>Select</th>
	<th>ID</th>
	<th>Name</th>
	</tr>";

	while($row = mysqli_fetch_array($result))
	{

	echo "<tr>";
	echo "<td><input type='radio' name='to' value='". $row['ID'] . "'></input></td>";
	echo "<td>" . $row['ID'] . "</td>";
	echo "<td>" . $row['Name'] . "</td>";


	/*echo "<td><a href='confirm.php?ID=" . $row['ID'] . "'>SELECT</a></td>";*/
	echo "</tr>";

	}

	echo "</table>";
	echo "<td><input type='hidden' name='from' value='". $from . "'></input></td>";
	echo "<br><br><center><input type='text' name='amount' id='amount' placeholder='Enter the amount'></center>";
	echo "<br><br><center><input type='submit' value='Confirm' class='button'></center>";
	echo "</form>";


	}

$con->close();
?>
</body>
</html>