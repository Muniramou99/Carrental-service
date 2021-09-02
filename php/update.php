<?php	
require_once 'cardb_connect.php';
	if($_POST) {
		$id = $_POST['id'];  
		$Username = $_POST['Username'];  		
		$Contactnum = $_POST['Contactnum'];
        $Psw = $_POST['Psw'] ;
        $Confirmpsw = $_POST['Confirmpsw']; 		
		$Presentdivision = $_POST['division']; 
		$Presentdistrict = $_POST['district']; 
		$Presentthana = $_POST['thana']; 
		$Vehicletype = $_POST['vehicletype'];
		$Vehiclecolor = $_POST['vehiclecolor'];
		$Seat = $_POST['Seat'];
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





        $sql = "UPDATE driver_tbl  SET Username='$Username', Contactnum='$Contactnum', Psw='$Psw', Confirmpsw='$Confirmpsw', Presentdivision='$pdname', Presentdistrict='$pdisname', Presentthana='$pthananame',Vehicletype='$Vehicletype', Vehiclecolor='$Vehiclecolor', Seat='$Seat' WHERE ID = {$id}";



if($connect->query($sql) === TRUE) {
echo "<span class='update'><p>Succcessfully Updated</p></span>";
echo "<a href='edit.php?id=".$id."'><button type='button'>Back</button></a>";
echo "<a href='driverinfopage.php'><button type='button'>Home</button></a>";
} else {
echo "Erorr while updating record : ". $connect->error;
}
$connect->close();
}
		}
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/update.css">
		<meta name="viewport" content="width=device-width">
		<title>carrent</title>
	</head>
	<body>
</body>
	</html>	


