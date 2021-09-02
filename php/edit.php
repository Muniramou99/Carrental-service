<?php require_once 'cardb_connect.php';

if($_GET['id']) {
$id = $_GET['id'];
$sql = "SELECT * FROM driver_tbl WHERE ID = {$id}";
$result = $connect->query($sql);
$data = $result->fetch_assoc();


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/edit.css">
		<meta name="viewport" content="width=device-width">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
         <script>
			 $(document).ready(function(){
                 $(".division").change(function(){
					 var division_id=$(this).val();
					 $.ajax({
						 url:"./district_thana.php",
						 method:"post",
						 data:{division_id:division_id},
						 success:function(data){
							 $(".district").html(data);
						 }
					 });
				 });

				
                 $(".district").change(function(){
					 var dis_division_id=$(".division").val();
					 var district_id=$(this).val();
					 $.ajax({
						 url:"./district_thana.php",
						 method:"post",
						 data:{dis_division_id:dis_division_id,district_id:district_id},
						 success:function(data){
							 $(".thana").html(data);
						 }
					 });
				 });



			 });
		 </script>
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
				<li><a style="color:red;"href="driverinfopage.php">back</a></li>
				<li><a style="color:red;" href="../html/about.html">about us</a></li>
				
			</ul>
		</nav>




        <fieldset>
        <legend>EDIT INFORMATION</legend>
<form action="update.php" method="post">
<table cellspacing="0" cellpadding="0">

<tr>
<th>Username</th>
<td><input type="text" name="Username" placeholder="Username" value="<?php echo $data['Username']?>" /></td>
</tr>


<tr>
<th>Contactnum </th>
<td><input type="text" name="Contactnum" placeholder="Contactnum" value="<?php echo $data['Contactnum']?>" /></td>
</tr>

<tr>
<th>Psw</th>
<td><input type="text" name="Psw" placeholder="Psw" value="<?php echo $data['Psw']?>" /></td>
</tr>


<tr>
<th>Confirmpsw</th>
<td><input type="text" name="Confirmpsw" placeholder="Confirmpsw" value="<?php echo $data['Confirmpsw']?>" /></td>
</tr>


<tr>
<th>Presentdivision</th>
<td> <select name="division" id="division" class="division">
		            <option value="" selected="selected">select division</option>
		            <?php  $sql2=mysqli_query($connect,"select * from division order by division_name");
		  while($row=mysqli_fetch_array($sql2))
		  {
			  ?>
                 <option value="<?php echo $row['ID'];?>"><?php echo $row['division_name'];?></option>
        <?php  
		  }
		  ?>
		  
	  </select>
</td>
</tr>

	               
<!-- <tr>
<th>Presentdivision</th>
<td><input type="text" name="Presentdivision" placeholder="Presentdivision" value="" /></td>
</tr> -->


<tr>
<th>Presentdistrict</th>
<td><select name="district" id="district" class="district">
		  <option value="" selected="selected">select district</option>
		  
		  
	  </select></td>
</tr>

<tr>
<th>Presentthana</th>
<td><select name="thana" id="thana" class="thana">
		  <option value="" selected="selected">select thana</option>  
	  </select></td>
</tr>

<tr>
<th>Vehicletype</th>
<td><select name="vehicletype" >
						<option selected="" value="Default">(Please select a Vehicle Type)</option>
						<option value="sedan">Sedan</option>
						<option value="hatchback">Hatchback</option>
						<option value="minivan">Minivan</option>
						<option value="micro">Micro</option>
						<option value="govambulance">Gov. Ambulance</option>
						<option value="ambulance">Ambulance</option>
					</select></td>
</tr>

<tr>
<th>Vehiclecolor</th>
<td><select name="vehiclecolor" >
						<option selected="" value="Default">(Please select a Vehicle color)</option>
						<option value="red">Red</option>
						<option value="white">White</option>
						<option value="black">Black</option>
						<option value="silver">Silver</option>
						<option value="redwine">RedWine</option>
						<option value="pearl">pearl</option>
					</select></td>
</tr>

<tr>
<th>Seat</th>
<td><select name="Seat" >
						
						<option value="s4">4</option>
						<option value="s5">5</option>
						<option value="s7">7</option>
						<option value="s10">10</option>
					</select></td>
</tr>



<tr>
<input type="hidden" name="id" value="<?php echo $id?>" />
<td><button type="submit">Save Changes</button></td>
<td><a href="driverinfopage.php"><button type="button">Back</button></a></td>
</tr>
</table>
</form>
</fieldset>


        </body>
	
	<footer>
		
		
		<div class="row1">
			<div class="column1 left">
				<h4>CONTACT US</h4>
				<ul>
				<li>Phone : 05526-73403, 01769 675554, 01769 675553, 01769 675552, 01769 675551</i></li>
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
<?php
}?>