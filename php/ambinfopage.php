<?php
	session_start();  
	
require_once 'cardb_connect.php';

$Vehcle=0;
if($_POST) {
	
		
	$Presentdivision = $_POST['division']; 
	$Presentdistrict = $_POST['district']; 
	$Presentthana = $_POST['thana']; 
	
	$pdname='';
	if(isset($_POST['division'])){

		$dname=mysqli_query($connect,"select * from division where ID='$Presentdivision'");
		if(mysqli_num_rows($dname)==1){

			$drow=mysqli_fetch_array($dname);
			$pdname=$drow['division_name'];

			$disname=mysqli_query($connect,"select * from district where ID='$Presentdistrict' and division_id='$Presentdivision'");
			$disrow=mysqli_fetch_array($disname);
			$pdisname=$disrow['district_name'];

			$thananame=mysqli_query($connect,"select * from thana where ID='$Presentthana' and district_id='$Presentdistrict' and division_id='$Presentdivision'");
			$thanarow=mysqli_fetch_array($thananame);
			$pthananame=$thanarow['thana_name'];


			
		}
		else{
			echo '<script>alert("num_rows")</script>';
		}
	}
	else{
		echo '<script>alert("is set if")</script>';
	}
	
	
	
}



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
				<li><a style="color:red;"href="../html/home.html">back</a></li>
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
					
						$sql = "SELECT * FROM driver_tbl WHERE active = 1 AND Vehicletype = 'govambulance'";
						$result = $connect->query($sql);
						if($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								if ($row['Presentdivision']==$pdname && $row['Presentdistrict']==$pdisname) {
								$Vehcle++;	
								
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
								"Seat: " .$row['Seat']."<br/>"."<br/>".
								"<button type='button'>Cancel</button>"."<a href='driver_hier.php?id=".$row['ID']."'><button type='button'>Confirm</button></a>"."<br/>";
							?>
							
							
							<span class=" <?php if($row['active']==1){echo 'available';}else {echo 'reserved';}?>"><?php if($row['active']==1){echo 'available';}else {echo 'reserved';}?></span><br/><br/>
							
							<?php  
							}
						}
						} 
						
						if($Vehcle==0){
						
							echo "<tr?><td style='width:100vw;'><center>No Data Avaliable</center></td></tr>";

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