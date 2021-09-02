<?php
	session_start();  
	
require_once 'cardb_connect.php';

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
				<li><a style="color:red;"href="division.html">back</a></li>
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
						$sql = "SELECT * FROM hier_tbl WHERE Driverid={$_SESSION['id']} order by ID desc limit 1";

						$result = $connect->query($sql);
						if($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $sql2 = "SELECT * FROM signup_tbl WHERE ID={$row['Userid']} ";
                            $result2 = $connect->query($sql2);
                            if($result2->num_rows > 0){

                            

							while($row2 = $result2->fetch_assoc()) {
                            
								echo 
								"<span  class='dinfo' style='color:black;'>USER INFORMATION </span>"."<br/>".
								"Username: ".$row2['Username']."<br/>".
							    "You can contact with the user using this mobile number!  "."</br>".
								"Mobile No: ".$row2['Contactnum']."<br/>".
                                "<a href='ridecancel.php?id=".$row['ID']."'><button type='button'>cancel ride</button></a>";
									?>
							
							
							<?php  
							}
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