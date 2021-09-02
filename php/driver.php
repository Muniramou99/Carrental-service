<?php	
require_once 'cardb_connect.php';
	if($_POST) {
		$Username = $_POST['username'];  
		$Nidnumber = $_POST['nidnumber']; 
        $Registrationnum = $_POST['registrationnum'];		
		$Contactnum = $_POST['contactnum'];
        $Psw = $_POST['psw'] ;
        $Confirmpsw = $_POST['confirmpsw']; 		
		$Presentdivision = $_POST['division']; 
		$Presentdistrict = $_POST['district']; 
		$Presentthana = $_POST['thana']; 
		$Vehicletype = $_POST['vehicletype'];
		$Vehiclecolor = $_POST['vehiclecolor'];
		$Seat = $_POST['seat'];
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


				$sql = "INSERT INTO driver_tbl (Username, Nidnumber, Registrationnum, Contactnum, Psw, Confirmpsw, Presentdivision, Presentdistrict, Presentthana,Vehicletype, Vehiclecolor, Seat,active ) VALUES ('$Username','$Nidnumber','$Registrationnum','$Contactnum','$Psw','$Confirmpsw','$pdname','$pdisname','$pthananame','$Vehicletype','$Vehiclecolor','$Seat',1)";
		if($connect->query($sql) === TRUE) {
			echo '<script>alert("signup Successfully Done")</script>';
			header("location:../php/driverlogin.php");
			
			
			} else {
			echo "Error " . $sql . ' ' . $connect->connect_error;
		}
			}
			else{
				echo '<script>alert("num_rows")</script>';
			}
		}
		else{
			echo '<script>alert("is set if")</script>';
		}
		
		
		$connect->close();
	}
?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/driver.css">
		<script src="../js/driverjs.js"></script>
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
		
		
		<h2>Please fill in this form to create an account.</h2>
		<hr>
		
		
		
		<form name="driverform"action="<?=$_SERVER['PHP_SELF']?>" onsubmit="return formValidation();" method="post">
			
			<div class ="fillup">  
				<ul>
					<li><label for="username">Name:</label></li>
					<li><input type="text" name="username" size="50" required></li>
					<li><label for="nidnumber">NID No.:</label></li>
					<li><input type="number" name="nidnumber" size="50" /></li>
					<li><label for="registrationnum">Vehicle Registration No.:</label></li>
					<li><input type="number" name="registrationnum" size="50" required></li>
					<li><label for="contactnum">Contact Num.:</label></li>
					<li><input type="number" name="contactnum" size="20" required></li>
					<li><label for="psw">Password:</label></li>
					<li><input type="Password" name="psw" size="20" required></li>
					
					<li><label for="confirmpsw">Confirm Password:</label></li>
					<li><input type="password" name="confirmpsw" size="20" required></li>
					<li><label for="">Division:</label>
	                <select name="division" id="division" class="division">
		            <option value="" selected="selected">select division</option>
		            <?php  $sql=mysqli_query($connect,"select * from division order by division_name");
		  while($row=mysqli_fetch_array($sql))
		  {
			  ?>
                 <option value="<?php echo $row['ID'];?>"><?php echo $row['division_name'];?></option>
        <?php  
		  }
		  ?>
		  
	  </select></li>
						
					
	  
	   
	   <li><label for="">District:</label>
	  <select name="district" id="district" class="district">
		  <option value="" selected="selected">select district</option>
		  
		  
	  </select></li>
	  
	  <li><label for="">Thana:</label>
	  <select name="thana" id="thana" class="thana">
		  <option value="" selected="selected">select thana</option>
		  
		  
	  </select></li>
	  			
					
					
					
					
					<li><label for="vehicletype">Select Your Vehicle Type:</label></li>
					<li><select name="vehicletype" >
						<option selected="" value="Default">(Please select a Vehicle Type)</option>
						<option value="sedan">Sedan</option>
						<option value="hatchback">Hatchback</option>
						<option value="minivan">Minivan</option>
						<option value="micro">Micro</option>
						<option value="govambulance">Gov. Ambulance</option>
						<option value="ambulance">Ambulance</option>
					</select></li>  
					
					
					<li><label for="vehiclecolor">Select Your Vehicle Color:</label></li>
					<li><select name="vehiclecolor" >
						<option selected="" value="Default">(Please select a Vehicle color)</option>
						<option value="red">Red</option>
						<option value="white">White</option>
						<option value="black">Black</option>
						<option value="silver">Silver</option>
						<option value="redwine">RedWine</option>
						<option value="pearl">pearl</option>
					</select></li>  
					
					
					
					
					<li><label for="seat">Select Num of Seats:</label></li>
					<li><select name="seat" >
						
						<option value="s4">4</option>
						<option value="s5">5</option>
						<option value="s7">7</option>
						<option value="s10">10</option>
					</select></li> 
					
				
				
				
				
				
				<li><button type="submit" class="signupbtn">Sign Up</button></li>
				</ul>
			</div>
			
			
			<p id=agree>By creating an account you agree to our <a href="../html/condition.html" style="color:dodgerblue;font-size:20px;">Terms & Privacy</a></p>
			
			
			
		</form>
		
		
		<div class="clearfix">
			<a href="../php/driverlogin.php"><button type="button" class="cancelbtn">LOGIN</button></a>
			
			
		</div>
		
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
		</div>
		
		</div>
		
		<div id="finish">
		<p>
		Thanks for visit.
		</p> 
		</div>
		
		
		
		</footer> 
		
		
		</html>		