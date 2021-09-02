<?php
	session_start();  
	
require_once 'cardb_connect.php';?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/driverinfopage.css">
		<link rel="stylesheet" href="../css/popup.css">
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
				<li><a style="color:red;"href="driverlogin.php">back</a></li>
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
						$sql2 = "SELECT * FROM driver_tbl WHERE ID={$_SESSION['id']} ";
						$result2 = $connect->query($sql2);
						if($result2->num_rows > 0) {
							$row2 = $result2->fetch_assoc();
							echo 
							"<span  class='dinfo' style='color:black;'>DRIVER INFORMATION </span>"."<br/>".
								"Username: ".$row2['Username']."<br/>".
								"Nidnumber: " .$row2['Nidnumber']."<br/>".
								"Registrationnum: " .$row2['Registrationnum']."<br/>".
								"Presentdivision: " .$row2['Presentdivision']."<br/>".
								"Presentdistrict: " .$row2['Presentdistrict']."<br/>".
								"Presentthana: " .$row2['Presentthana']."<br/>".
								"Vehicletype: " .$row2['Vehicletype']."<br/>".
								"Vehiclecolor: " .$row2['Vehiclecolor']."<br/>".
								"Seat: " .$row2['Seat']."<br/>";
								if($row2['Username']==$_SESSION['uname']){
									if ($row2['active']==1) {
										echo "<a href='#'><button type='button'>Available</button></a>"."<br/>";
											
										}
										else if ($row2['active']==2) {
										echo "<a href='ride.php'><button type='button'>Reserved</button></a>"."<br/>";
									    echo "<div class='popup active' id='popup-1'>".
										"<div class='overlay'>".
                                        "<div class='content_2'>".
										  "<div class='close-btn' onclick='togglePopup()'>×</div>".
										  "<h1>Congratulation!</h1>".
										  "<p>You-Hoo!!!! you have been hired.<span class='alart-color'> Click </span>the reserved button sothat you  can see the information of user</p>".
										   "<a href='ride.php'><button class='button reserved_btn' type='button'>Reserved</button></a>"."<br/>".
										  "</div>".
										"</div>".
										

									  "</div>";
									  
									      
										
										}
										echo 
										
										"<a href='edit.php?id=".$_SESSION['id']."'><button type='button'>Edit</button></a>".
										"<a href='./logout.php'><button type='button'>logout</button></a>"."<hr>"."<br/>"
										;
										
								}
						}


						$sql = "SELECT * FROM driver_tbl WHERE active = 1";
						$result = $connect->query($sql);
						if($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								
								echo 
								"<span class='dinfo' style='color:black;'>DRIVER INFORMATION </span>"."<br/>".
								"Username: ".$row['Username']."<br/>".
								"Nidnumber: " .$row['Nidnumber']."<br/>".
								"Registrationnum: " .$row['Registrationnum']."<br/>".
								"Presentdivision: " .$row['Presentdivision']."<br/>".
								"Presentdistrict: " .$row['Presentdistrict']."<br/>".
								"Presentthana: " .$row['Presentthana']."<br/>".
								"Vehicletype: " .$row['Vehicletype']."<br/>".
								"Vehiclecolor: " .$row['Vehiclecolor']."<br/>".
								"Seat: " .$row['Seat']."<br/>";
								
							?>
							
							
							<span class=" <?php if($row['active']==1){echo 'available';}else {echo 'reserved';}?>"><?php if($row['active']==1){echo 'available';}else {echo 'reserved';}?></span><br/></br>
							
							
							
							<?php  
							}
						} 
						else{
							echo "<tr?><td colspan='5'><center>No Data Avaliable</center></td></tr>";
						}
					?>
				</tbody>
			</table>
		</div>
		
		
		<script type="text/javascript">function togglePopup(){

	    document.getElementById('popup-1').classList.toggle('active');
										  }
										  
	    </script>
		
	</body>
	
	<footer>
		
		
		<div class="row1">
			<div class="column1 left">
				<h4>CONTACT US</h4>
				<ul>
				<li></i>Phone : 05526-73403, 01769 675554, 01769 675553, 01769 675552, 01769 675551</i></li>
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