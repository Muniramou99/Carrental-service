<?php	
require_once 'cardb_connect.php';
	if($_POST) {
		$name = $_POST['uname'];
		$contactnum = $_POST['contactnum'];
		$password = $_POST['psw'];
		$sql = "INSERT INTO signup_tbl (Username, Password,Contactnum) VALUES ('$name','$password','$contactnum')";
		if($connect->query($sql) === TRUE) {
			echo '<script>alert("signup Successfully Done")</script>';
			
			
			} else {
			echo "Error " . $sql . ' ' . $connect->connect_error;
		}
		$connect->close();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/useregister.css">
		<script src="../js/loginjs.js"></script>
		<meta name="viewport" content="width=device-width">
		<title>carrent</title>
	</head>
	
	<div class="header"> 
		<div class="row">
			<div class="column">
				<h1>BD Car Rental Service</h1>
			</div>
			<div class="column">
				<img src="../pic/logo1.png"alt="Logo"/>
			</div>
			<div class="column">
				<h1>www.bdcarrental.com</h1>
			</div>
		</div> 
	</div>
	
	<body> 
		<nav id="nav">
			<ul>
				<li><a style="color:red;"href="../php/login.php">back</a></li>
				<li><a style="color:red;" href="../html/about.html">about us</a></li>
				
			</ul>
		</nav>
		
		<form name="loginform"action="<?=$_SERVER['PHP_SELF']?>"onsubmit="return formValidation();" method="post">
			
			<div class="imgcontainer">
				<img src="../pic/signup.png" alt="login" class="login">
			</div>
			
			<div class="container1">
				<label for="uname"><b style="color:#DAA520">Username</b></label>
				<input type="text" placeholder="Enter Username" name="uname"  required>
				<br>
				<label for="contactnum"><b style="color:#DAA520">Contact Number</b></label>
				<input type="text" placeholder="Enter Contact Number " name="contactnum"  required>
				<br>
				<label for="psw"><b style="color:#DAA520">Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>
				<br>
				<label for="confirmpsw"><b style="color:#DAA520">confirm Password</b></label>
				<input type="password" placeholder="Enter Password" name="confirmpsw" required>
				<button type="submit">signup</button>
				
			</div>
			
			<div class="container">
			<a href="../php/login.php"><button type="button" class="cancelbtn">login</button></a>	
			</div>
			
		</form>
		
		
		
		
		
	</body>
	
	<footer>
		
		
		<div class="row1">
			<div class="column1 left">
				<h4>CONTACT US</h4>
				<ul>
				<li><i class="fas fa-phone-alt"></i>Phone : 05526-73403, 01769 675554, 01769 675553, 01769 675552, 01769 675551</i></li>
				<li>Email : mou@baust.edu.bd, anite@baust.edu.bd, tanzim@baust.edu.bd</li>
				<li>Address : Saidpur Cantonment, Saidpur</li>
			</div>
			<div class="column1 middle">
				<div id="ftext">
					<p>you can pay using</p>
					
				</div>	
				<img src="../pic/credit.png"alt="Logo"/>
				<img src="../pic/debit.png"alt="Logo"/>
				<img src="../pic/bkash.png"alt="Logo"/>
				<img src="../pic/nogod.jpg"alt="Logo"/>
				<img src="../pic/roket.png"alt="Logo"/>
				
				
			</div>
			<div class="column1 right">
				<h4>PRODUCT</h4>
				<ul>
					<li>Car booking</li>
					<li>ambulance booking</li>
					<li>Address : Saidpur Cantonment, Saidpur</li>
				</ul>   
			</div>
			
		</div>
		
		<div id="finish">
			<p>
				Thanks for visit.
			</p> 
		</div>
		
		
		
	</footer> 
	
	
</html>			