<?php 
   session_start();     
    require_once 'cardb_connect.php';

	if(isset($_POST["login"]))
	{
		
		$username = $_POST['uname'];  
		$password = $_POST['psw'];  
		
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($connect, $username);  
        $password = mysqli_real_escape_string($connect, $password);  
		
        $sql = "SELECT *FROM driver_tbl WHERE Username = '$username' AND Psw = '$password'";  
        $result = mysqli_query($connect, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
		
        if($count == 1)
		{ 
			$_SESSION['uname']=$row['Username'];
			$_SESSION['nid']=$row['Nidnumber'];
			$_SESSION['rid']=$row['Registrationnum'];
			$_SESSION['id']=$row['ID'];
			$_SESSION['active']=$row['active'];
			

			if(!empty($_POST["remember"]))
			{
				setcookie ("member_login",$username,time()+(10*365*24*60*60));
				setcookie ("member_password",$password,time()+(10*365*24*60*60));
			}
			else{
		        if(isset($_COOKIE["member_login"]))
				{
					setcookie("member_login","");
				}
				if(isset($_COOKIE["member_password"]))
				{
					setcookie("member_password","");
				}
			}
            //echo '<script>alert("Login successful ")</script>';  
			header("location:../php/driverinfopage.php");
			
		}  
        else{  
             echo '<script>alert(" Login failed. Invalid username or password.")</script> ';
             echo '<script>window.location = "../php/driverlogin.php"</script> ';

			 
			 
		}  
		
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/login.css">
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
				<li><a style="color:red;"href="../html/index.html">back</a></li>
				<li><a style="color:red;" href="../html/about.html">about us</a></li>
				
			</ul>
		</nav>
		
		<form name="loginform"action="<?=$_SERVER['PHP_SELF']?>"onsubmit="return formValidation();" method="post">
			
			<div class="imgcontainer">
				<img src="../pic/login.png" alt="login" class="login">
			</div>
			
			<div class="container1">
				<label for="uname"><b style="color:#DAA520">Username</b></label>
				<input type="text" placeholder="Enter Username" name="uname"  required>
				<br>
				<label for="psw"><b style="color:#DAA520">Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>
				<br>
				<label>
					<input type="checkbox" name="remember" />
					<b style="color:#DAA520">Remember me</b>
				</label>
				
				<button type="submit" name="login">Login</button>
				
				
			</div>
			<div class="container">
				<button type="button" class="cancelbtn">Cancel</button>
				<span class="psw">you don't have account? <a href="../php/driver.php"><b style="color:#DAA520;font-size:20px;">signup?</b></a></span>
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