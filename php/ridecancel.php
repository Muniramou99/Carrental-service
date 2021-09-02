<?php
	session_start();  	
require_once 'cardb_connect.php';
$id=$_GET['id'];
$sql = "UPDATE   driver_tbl SET active=1 where ID={$_SESSION['id']}";						
if($connect->query($sql) === TRUE)  {                            
                            $sql2 = "DELETE  FROM  hier_tbl WHERE ID={$id} ";
                            if($connect->query($sql2) === TRUE){	
                                echo '<script>alert("ride successfully canceled")</script>';
                                header("location:driverinfopage.php");

						} 
                    }
						else{
							echo "Ohh no !!! Your rider has canceled the ride,please go back to division page and select again"."</br>".
							"<a href='division.php'><button type='button'>select ride again</button></a>";
						}
?>