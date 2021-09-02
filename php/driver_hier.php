<?php	
session_start();  
require_once 'cardb_connect.php';
$userid=$_SESSION['Userid'];
$driverid=$_GET['id'];
$date=date("Y/m/d");
 $sql = "UPDATE driver_tbl  SET active=2 where ID={$driverid}";



if($connect->query($sql) === TRUE) {

    $sql2 = "INSERT INTO hier_tbl (Userid, Driverid,Date) VALUES ('$userid','$driverid','$date')";
		if($connect->query($sql2) === TRUE) {
			echo '<script>alert("Successfully hiered");</script>';
			header("location:reserved.php?id=".$driverid);
        
			
			
			} else {
			echo "Error " . $sql2 . ' ' . $connect->connect_error;
		}
    

} else {
echo "Erorr while hiering car : ". $connect->error;
}
$connect->close();

	

?>



