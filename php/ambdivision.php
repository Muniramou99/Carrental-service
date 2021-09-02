<?php
session_start();  
include_once "../php/cardb_connect.php"
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/division.css">
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
				<li><a style="color:red;"href="../php/login.php">back</a></li>
				<li><a style="color:red;" href="../html/about.html">about us</a></li>
				
			</ul>
		</nav>
		
		<h2>Choose your Division, District & Thana  from the list</h2>
		<hr>
		
	<form action="ambinfopage.php" method="POST">

	<div class="container1">
	  <label for="">Division</label>
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
		  
	  </select>
	   <br>
	   <br>
	  <label for="">District</label>
	  <select name="district" id="district" class="district">
		  <option value="" selected="selected">select district</option>
		  
		  
	  </select>
	  <br>
	  <br>
	  <label for="">Thana</label>
	  <select name="thana" id="thana" class="thana">
		  <option value="" selected="selected">select thana</option>
		  
		  
	  </select>
	  <br>
	  <br>
		</div>
	
	
		<button type="submit" name="submit">submit</button>
	
	</form>
	
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
    </div>
	</ul>
	
	</div>
	
	<div id="finish">
	<p>
	Thanks for visit.
	</p> 
	</div>
	
	
	
	</footer> 
	
	
	</html>	