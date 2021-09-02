<?php
	session_start();  
	
require_once 'cardb_connect.php';
$driverid=$_GET['id'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/userpage.css">
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
				<li><a style="color:red;"href="#">back</a></li>
				<li><a style="color:red;" href="../html/about.html">about us</a></li>
				
			</ul>
		</nav>
		
		<div class="manageMember">
			
			<table>
				<thead>
					<tr>
						
					</tr>
				</thead>
				<tbody>
					
					<?php
					
						$sql = "SELECT * FROM driver_tbl WHERE active = 2 and ID={$driverid}";
						$result = $connect->query($sql);
						if($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo 
								"<span  class='dinfo' style='color:black;'>DRIVER INFORMATION </span>"."<br/>".
								"Username: ".$row['Username']."<br/>".
								"You can contact with the driver using this mobile number!  "."</br>".
								"Mobile No: ".$row['Contactnum']."<br/>";
							
							?>
							
							
							<span class=" <?php if($row['active']==1){echo 'available';}else {echo 'reserved';}?>"><?php if($row['active']==1){echo 'available';}else {echo 'reserved';}?></span><br/>
							
							
							
							<?php  
							}
						} 
						else{
							echo "Ohh no !!! Your rider has canceled the ride,please go back to division page and select again"."</br>".
							"<a href='division.php'><button type='button'>select ride again</button></a>";
						}
					?>
				</tbody>
			</table>
		</div>
		
		
		


</body>

<footer>
	
	
	<div class="row1">
		<div class="column1 left">
			<h4>CONTACT US</h4>
			<ul>
				<li>Phone : 05526-73403, 01769 675554, 01769 675553, 01769 675552, 01769 675551</li>
				<li>Email : mou@baust.edu.bd, anite@baust.edu.bd, tanzim@baust.edu.bd</li>
				<li>Address : Saidpur Cantonment, Saidpur</li>
			</ul>
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